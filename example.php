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

include('wordlist-regex.php');
include('censor.function.php');
$censored = censorString(htmlentities(trim($argv[1])), $badwords);			
echo "\nPURE: ".$argv[1]."\nORIGINAL:      ".$censored['orig']."\nPROCESSED:     ".$censored['clean']."\n\n";
 



	