<?php
/**
 *  Generates a random string.
 *  @param        string          $chars        Chars that can be used.
 *  @param        int             $len          Length of the output string.
 *  string
 */
function randCensor($chars, $len) {
	
	mt_srand(); // useful for < PHP4.2
	$lastChar = strlen($chars) - 1;
	$randOld = -1;
	$out = '';
	
	// create $len chars
	for ($i = $len; $i > 0; $i--) {
		// generate random char - it must be different from previously generated
		while (($randNew = mt_rand(0, $lastChar)) === $randOld) { }
		$randOld = $randNew;
		$out .= $chars[$randNew];
	}
	
	return $out;
	
}


/**
 *  Apply censorship to $string, replacing $badwords with $censorChar.
 *  @param        string          $string        String to be censored.
 *  @param        string[int]     $badwords      Array of badwords.
 *  @param        string          $censorChar    String which replaces bad words. If it's more than 1-char long,
 *                                               a random string will be generated from these chars. Default: '*'
 *  string[string]
 */
function censorString($string, $badwords, $censorChar = '*') {  
              
		$leet_replace = array();
		$leet_replace['a']= '(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|α|Δ|Λ|λ)';
		$leet_replace['b']= '(b|b\.|b\-|8|\|3|ß|Β|β)';
		$leet_replace['c']= '(c|c\.|c\-|Ç|ç|¢|€|<|\(|{|©)';
		$leet_replace['d']= '(d|d\.|d\-|&part;|\|\)|Þ|þ|Ð|ð)';
		$leet_replace['e']= '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|∑)';
		$leet_replace['f']= '(f|f\.|f\-|ƒ)';
		$leet_replace['g']= '(g|g\.|g\-|6|9)';
		$leet_replace['h']= '(h|h\.|h\-|Η)';
		$leet_replace['i']= '(i|i\.|i\-|!|\||\]\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï)';
		$leet_replace['j']= '(j|j\.|j\-)';
		$leet_replace['k']= '(k|k\.|k\-|Κ|κ)';
		$leet_replace['l']= '(l|1\.|l\-|!|\||\]\[|]|£|∫|Ì|Í|Î|Ï)';
		$leet_replace['m']= '(m|m\.|m\-)';
		$leet_replace['n']= '(n|n\.|n\-|η|Ν|Π)';
		$leet_replace['o']= '(o|o\.|o\-|0|Ο|ο|Φ|¤|°|ø)';
		$leet_replace['p']= '(p|p\.|p\-|ρ|Ρ|¶|þ)';
		$leet_replace['q']= '(q|q\.|q\-)';
		$leet_replace['r']= '(r|r\.|r\-|®)';
		$leet_replace['s']= '(s|s\.|s\-|5|\$|§)';
		$leet_replace['t']= '(t|t\.|t\-|Τ|τ)';
		$leet_replace['u']= '(u|u\.|u\-|υ|µ)';
		$leet_replace['v']= '(v|v\.|v\-|υ|ν)';
		$leet_replace['w']= '(w|w\.|w\-|ω|ψ|Ψ)';
		$leet_replace['x']= '(x|x\.|x\-|Χ|χ)';
		$leet_replace['y']= '(y|y\.|y\-|¥|γ|ÿ|ý|Ÿ|Ý)';
		$leet_replace['z']= '(z|z\.|z\-|Ζ)';
     
        $words = explode(" ", $string);
        
		// is $censorChar a single char?
        $isOneChar = (strlen($censorChar) === 1);
		
        for ($x=0; $x<count($badwords); $x++) {

        	$replacement[$x] = $isOneChar
                ? str_repeat($censorChar,strlen($badwords[$x]))
                : randCensor($censorChar,strlen($badwords[$x]));
			
        	$badwords[$x] =  '/'.str_ireplace(array_keys($leet_replace),array_values($leet_replace), $badwords[$x]).'/i';
        }
        
        $newstring = array();
        $newstring['orig'] = html_entity_decode($string);
        $newstring['clean'] =  preg_replace($badwords,$replacement, $newstring['orig']);    
        
        return $newstring;
           
}