Banbuilder
==========

Banbuilder is a PHP function and bad word database for profanity filtering. The PHP script uses regex to intelligently look for "leetspeak"-style numeric or symbol replacements. 

The database of profanity is located in the wordlist-regex.php file, and is a simple PHP array. 

Usage
------
Simply require the database file and the function file, and invoke the function:

     include('wordlist-regex.php');
     include('censor.function.php');
     $censored = censorString($input, $badwords); 

You end up with an array called <code>$censored</code>. You can access the original, uncensored string as <code>$censored['orig']</code> and the newly censored string as <code>$censored['clean']</code>.

There is an optional string parameter that you can pass to use a different replacement character. For example:

     $censored = censorString($input, $badwords,'X'); 

Will replace "bitch" to "XXXXX" instead of the default "*****".

If the optional parameter is more than 1 character long, a bad words will be replaced by random strings which are composed by characters taken from the string. For example:

     $censored = censorString($input, $badwords,'X!°#%$@');

Could replace "bitch" to something like "%#@#@" or "%@!X#".

Summary
-------
In a nutshell, this code takes your array of bad words and compares it to an array of common filter-evasion tactics. It then does a string replacement to insert regex parameters into your badwords array, and then evaluates your input string to that expanded banned word list.

So in your bad words array, you might have:

     [0] => 'ass'

The preg_replace functions replace all of the possible shenaningan letters with regex patterns (in lieu of adding the variants onto the end of the array), so the 'ass' in your array gets turned into this, right before the preg_replace checks for matches:

     [0] => /(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|α)(s|s\.|s\-|5|\$|§)(s|s\.|s\-|5|\$|§)/i

This means that a word can have none, one or any variety of leet replacements and it will still trip the trigger. Part of the leet filter includes stripping out letter-dash and letter-dots. 

This means that the following all evaluate to the "bitch":

- B1tch
- bi7tch
- b.i.t.c.h.
- b-i-t-c-h
- b.1.t.c.h.
- ßitch
- and so on....

Legacy Database
---------------
When this project was first started, it was used to compile a database of swear words in every permutation for scenarios where regex wasn't possible for whatever reason). While the regex method is much better, the legacy full (non-regexy) databases contain over 800 words ready to use in banned words lists for projects. You can find those badword lists in the word-dbs directory [in the repo](https://github.com/snipe/banbuilder/tree/master/word-dbs). These databases are extra and are not required for the PHP function to run.

Current file types are:

- SQL
- CSV
- LaTex
- YML
- XML
- PHP Array