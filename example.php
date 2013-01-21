<?php
/**
* This is a simple script to test whether the words you've 
* added will be properly censored in a sentence format.
* 
* Usage via command line: /path/to/php example.php "snipe is a bitch, but she knows her shit. NO BULLSHIT."
* Usage via www: /url/example.php?snipe is a bitch but she's fucking great! NO BULLSHIT.
* 
* Output:
* ORIGINAL:      snipe is a bitch, but she knows her shit. NO BULLSH!T. 
* SUBSITUTIONS:  snipe is a bitch, but she knows her shit. NO BULLSHiT.
* PROCESSED:     snipe is a *****, but she knows her ****. NO BULL****.
*/

include('wordlist-regex.php');
include('censor.function.php');

// cli or www?
if (isset($argv)) {
	// get input from CLI
	$input = htmlentities(trim($argv[1]));
} else {
	// input is the whole querystring
	$input = urldecode($_SERVER['QUERY_STRING']);
	// no HTML
	header('Content-Type: text/plain');
}

$censored = censorString($input, $badwords);			
echo "\nPURE: ".$input."\nORIGINAL:      ".$censored['orig']."\nPROCESSED:     ".$censored['clean']."\n\n";
 



	