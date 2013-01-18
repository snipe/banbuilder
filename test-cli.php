<?php
/**
* This is a simple command line script to test whether the words you've 
* added will be properly censored in a sentence format.
* 
* Usage (via command line): /path/to/php test-cli.php "snipe is a bitch, but she knows her shit. NO BULLSHIT."
* 
* Output:
* ORIGINAL: snipe is a bitch, but she knows her shit. NO BULLSHIT. 
* PROCESSED: snipe is a ***** but she knows her **** NO BULL**** 
*/

$orig = '';
$censored ='';
for ($x=1; $x<count($argv); $x++) {
	$orig .= trim($argv[$x]).' ';
	$censored .= censorString(trim($argv[$x])).' ';
}			
		
		
		
echo "\nORIGINAL: ".$orig."\nPROCESSED: ".$censored."\n\n";
 
function censorString($string) {  
		// strip punctuation
		$string = preg_replace("/[^a-zA-Z 0-9]+/", "", trim($string));
		       
        $badwords = array(
        'ass',
        'fuk',
        'fag',
        'tit',
        'cum',
        'jiz',
        'vag',
        'cunt',
        'kunt',
        'fuck',
        'piss',
        'twat',
        'slut',
        'blow',
        'boob',
        'bewb',
        'b00b',
        'dick',
        'jizz',
        'shit',
        'shlt',
        'sh1t',
        'hell',
        'cock',
        'c0ck',
        'wank',
        'cawk',
        'kike',
        'k1k3',
        'gook',
        'g00k',
        'spoo',
        'sp00',
        'bitch',
        'whore',
        'wh0re',
        'wh0r3',
        'queef',
        'dildo',
        'spick',
        'penis',
        'pen1s',
        'p3n1s',
        'labia',
        'vulva',
        'rimjob',
        'douche',
        'honkey',
        'nigger',
        'n1gger',
        'n1gg3r',
        'vagina',
        'spooge',
        'sp00ge',
        'sp00g3',
        'bastard',
        'b4st4rd',
        'handjob',
        'handj0b',
        'nutsack',
        'humping',
        'abortion',
        'ab0rti0n',
        'ab0rt10n',
        'bestiality',
        'beastiality',
         );
        
             
      for ($x=0; $x<count($badwords); $x++) {
      	$stars='';
      	for ($y=0; $y < strlen($badwords[$x]); $y++) {
      		$stars.="*"; 
      	}
      	$replacements[$x]=$stars;
      }
      
      $newstring = str_ireplace($badwords, $replacements, $string);
      return $newstring;
      
}

