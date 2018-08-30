<?php

namespace Snipe\BanBuilder;

class CensorWords
{
    public $badwords;

    /*
    * When the dictionary is loaded, a ton of regular expression strings are generated
    * These regular expressions are used to perform the profanity checks.
    * Store them here so when we call censorString we don't need to regenerate them on every call
    */
    private $censorChecks = null;

    /**
     * @var array
     */
    private $whiteList = [];

    /**
     * @var string
     */
    private $whiteListPlaceHolder = ' {whiteList[i]} ';

    public function __construct()
    {
        $this->badwords = array();
        $this->replacer = '*';
        $this->setDictionary('en-us');
    }


    /**
     *  Sets the dictionar(y|ies) to use
     *  This can accept a string to a language file path,
     *  or an array of strings to multiple paths
     *
     *  @param		string|array
     *  @throws     \RuntimeException   if a dictionary file is not found
     */
    public function setDictionary($dictionary)
    {
        $this->badwords = $this->readBadWords($dictionary);
    }

    /**
     *  Add more the dictionar(y|ies) to current bad words list
     *  This can accept a string to a language file path,
     *  or an array of strings to multiple paths
     *
     *  @param		string|array
     *  @throws     \RuntimeException   if a dictionary file is not found
     */
    public function addDictionary($dictionary)
    {
        $this->badwords = array_merge($this->badwords, $this->readBadWords($dictionary));
    }

    /**
     *  Adds more words to current bad words list from an array of words.
     *
     *  @param		array
     */
    public function addFromArray($words)
    {
        $badwords       = array_merge($this->badwords, $words);
        $this->badwords = array_keys(array_count_values($badwords));
    }

    /**
     * Read bad words list from dictionar(y|ies) and return it
     *
     * @param       string|array        a language identifier or path for a dictionary (or an array of identifiers/paths)
     *
     * @throws      \RuntimeException   if a dictionary file is not found
     *
     * @return      array               de-duplicated array of bad words
     */
    private function readBadWords($dictionary)
    {
        $badwords     = array();
        $baseDictPath = __DIR__ . DIRECTORY_SEPARATOR . 'dict' . DIRECTORY_SEPARATOR;

        if (is_array($dictionary)) {
            foreach ($dictionary as $dictionary_file) {
                $badwords = array_merge($badwords, $this->readBadWords($dictionary_file));
            }
        }

        // just a single string, not an array
        if (is_string($dictionary)) {
            if (file_exists($baseDictPath . $dictionary . '.php')) {
                include $baseDictPath . $dictionary . '.php';
            } elseif (file_exists($dictionary)) {
                include $dictionary;
            } else {
                throw new \RuntimeException('Dictionary file not found: ' . $dictionary);
            }
        }

        // counting values and then only returning the keys is said
        // to be more efficient than array_values(array_unique())
        return array_keys(array_count_values($badwords));
    }

    /**
     * List of word to add which will be overridden
     *
     * @param array $list
     */
    public function addWhiteList(array $list)
    {
        foreach ($list as $value) {
            if (is_string($value) && !empty($value)) {
                $this->whiteList[]['word'] = $value;
            }
        }
    }

    /**
     * Replace white listed words with placeholders and inversely
     *
     * @param      $string
     * @param bool $reverse
     *
     * @return mixed
     */
    private function replaceWhiteListed($string, $reverse = false)
    {
        foreach ($this->whiteList as $key => $list) {
            if ($reverse && !empty($this->whiteList[$key]['placeHolder'])) {
                $placeHolder = $this->whiteList[$key]['placeHolder'];
                $string      = str_replace($placeHolder, $list['word'], $string);
            } else {
                $placeHolder                          = str_replace('[i]', $key, $this->whiteListPlaceHolder);
                $this->whiteList[$key]['placeHolder'] = $placeHolder;
                $string                               = str_replace($list['word'], $placeHolder, $string);
            }
        }

        return $string;
    }

    /**
     *  Sets the replacement character to use
     *
     * @param        string $replacer Character to use.
     */
    public function setReplaceChar($replacer)
    {
        $this->replacer = $replacer;
    }


    /**
     *  Generates a random string.
     *
     * @param        string $chars Chars that can be used.
     * @param        int    $len   Length of the output string.
     *
     *
     * @return string
     */
    public function randCensor($chars, $len)
    {
        return str_shuffle(
            str_repeat($chars, (int)($len / strlen($chars))) .
            substr($chars, 0, $len % strlen($chars))
        );
    }

    /**
     * Generates the regular expressions that are going to be used to check for profanity
     *
     * @param        boolean $fullWords Option to generate regular expressions used for full words instead. Default is
     *                                  false
     */
    private function generateCensorChecks($fullWords = false)
    {
        $badwords = $this->badwords;

        // generate censor checks as soon as we load the dictionary
        // utilize leet equivalents as well
        $leet_replace      = array();
        $leet_replace['a'] = '(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|α|Δ|Λ|λ)';
        $leet_replace['b'] = '(b|b\.|b\-|8|\|3|ß|Β|β)';
        $leet_replace['c'] = '(c|c\.|c\-|Ç|ç|¢|€|<|\(|{|©)';
        $leet_replace['d'] = '(d|d\.|d\-|&part;|\|\)|Þ|þ|Ð|ð)';
        $leet_replace['e'] = '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|∑)';
        $leet_replace['f'] = '(f|f\.|f\-|ƒ)';
        $leet_replace['g'] = '(g|g\.|g\-|6|9)';
        $leet_replace['h'] = '(h|h\.|h\-|Η)';
        $leet_replace['i'] = '(i|i\.|i\-|!|\||\]\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï)';
        $leet_replace['j'] = '(j|j\.|j\-)';
        $leet_replace['k'] = '(k|k\.|k\-|Κ|κ)';
        $leet_replace['l'] = '(l|1\.|l\-|!|\||\]\[|]|£|∫|Ì|Í|Î|Ï)';
        $leet_replace['m'] = '(m|m\.|m\-)';
        $leet_replace['n'] = '(n|n\.|n\-|η|Ν|Π)';
        $leet_replace['o'] = '(o|o\.|o\-|0|Ο|ο|Φ|¤|°|ø)';
        $leet_replace['p'] = '(p|p\.|p\-|ρ|Ρ|¶|þ)';
        $leet_replace['q'] = '(q|q\.|q\-)';
        $leet_replace['r'] = '(r|r\.|r\-|®)';
        $leet_replace['s'] = '(s|s\.|s\-|5|\$|§)';
        $leet_replace['t'] = '(t|t\.|t\-|Τ|τ|7)';
        $leet_replace['u'] = '(u|u\.|u\-|υ|µ)';
        $leet_replace['v'] = '(v|v\.|v\-|υ|ν)';
        $leet_replace['w'] = '(w|w\.|w\-|ω|ψ|Ψ)';
        $leet_replace['x'] = '(x|x\.|x\-|Χ|χ)';
        $leet_replace['y'] = '(y|y\.|y\-|¥|γ|ÿ|ý|Ÿ|Ý)';
        $leet_replace['z'] = '(z|z\.|z\-|Ζ)';

        $censorChecks = array();
        for ($x = 0, $xMax = count($badwords); $x < $xMax; $x++) {
            $censorChecks[$x] = $fullWords
                ? '/\b' . str_ireplace(array_keys($leet_replace), array_values($leet_replace), $badwords[$x]) . '\b/i'
                : '/'   . str_ireplace(array_keys($leet_replace), array_values($leet_replace), $badwords[$x]) . '/i';
        }

        $this->censorChecks = $censorChecks;
    }

    /**
     *  Apply censorship to $string, replacing $badwords with $censorChar.
     *
     * @param        string $string    String to be censored.
     * @param        bool   $fullWords Option to censor by word only.
     *
     * @return array
     */
    public function censorString($string, $fullWords = false)
    {
        // generate our censor checks if they are not defined yet
        if (!$this->censorChecks) {
            $this->generateCensorChecks($fullWords);
        }

        $anThis            = &$this;
        $counter           = 0;
        $match             = array();
        $newstring         = array();
        $newstring['orig'] = html_entity_decode($string);
        $original          = $this->replaceWhiteListed($newstring['orig']);
        // $anThis for <= PHP5.3
        $newstring['clean']   = preg_replace_callback(
            $this->censorChecks,
            function ($matches) use (&$anThis, &$counter, &$match) {
                $match[$counter++] = $matches[0];

                // is $anThis->replacer a single char?
                return (strlen($anThis->replacer) === 1)
                    ? str_repeat($anThis->replacer, strlen($matches[0]))
                    : $anThis->randCensor($anThis->replacer, strlen($matches[0]));
            },
            $original
        );
        $newstring['clean']   = $this->replaceWhiteListed($newstring['clean'], true);
        $newstring['matched'] = $match;

        return $newstring;
    }
}
