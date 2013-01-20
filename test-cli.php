<?php
/**
* This is a simple command line script to test whether the words you've 
* added will be properly censored in a sentence format.
* 
* Usage (via command line): /path/to/php test-cli.php "snipe is a bitch, but she knows her shit. NO BULLSHIT."
* 
* Output:
* ORIGINAL:      snipe is a bitch, but she knows her shit. NO BULLSH!T. 
* SUBSITUTIONS:  snipe is a bitch, but she knows her shit. NO BULLSHiT.
* PROCESSED:     snipe is a *****, but she knows her ****. NO BULL****.
*/

$censored = censorString(trim($argv[1]));			
echo "\nORIGINAL:      ".$argv[1]."\nSUBSITUTIONS:  ".$censored['tmp']."\nPROCESSED:     ".$censored['clean']."\n\n";
 
function censorString($string) {  
		     
        $badwords = array(
	        'ass',
	        'anal',
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
	        'dick',
	        'jizz',
	        'shit',
	        'hell',
	        'cock',
	        'wank',
	        'cawk',
	        'kike',
	        'gook',
	        'spoo',
	        'bitch',
	        'whore',
	        'queef',
	        'dildo',
	        'spick',
	        'penis',
	        'pen1s',
	        'labia',
	        'vulva',
	        'rimjob',
	        'douche',
	        'honkey',
	        'nigger',
	        'vagina',
	        'spooge',
	        'bastard',
	        'handjob',
	        'nutsack',
	        'humping',
	        'abortion',
	        'bestiality',
	        'beastiality',
         );
         
         $notsoclever = array(
         	'0' => 'o',
         	'1' => 'i',       	
         	'7' => 't',
         	'5' => 's',
         	'4' => 'a',
         	'8' => 'b',
         	'3' => 'e',   
         	'!' => 'i',
         	'$' => 's',     	
         );
        
        
       // $newstring=  preg_replace($patterns, $replacement, $input);
         
         
        // break the string out by spaces
        $words = explode(" ", $string);
        
        // loop through the word array
        for ($x=0; $x<count($words); $x++) {
        echo strlen($badwords[$x]);
        	// first replace known numeric and symbol substitutions 
        	$newstring['tmp'] = str_ireplace(array_keys($notsoclever),array_values($notsoclever), $string);	
		      	
		      $newstring['clean'] = str_ireplace($badwords, str_repeat('*',strlen($badwords[$x])), $newstring['tmp']);
		      //$newstring['clean']=  preg_replace($badwords, $replacements, $newstring['tmp']);
		      //$newstring['clean'] = preg_replace('/\b'.$badwords.'\b/ie',"str_repeat('*',strlen('$0'))",$newstring);
        }
     
      return $newstring;
      
}