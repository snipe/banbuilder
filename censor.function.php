<?php
function censorString($string, $badwords) {  
              
		$leet_replace = array();
		$leet_replace['a']= '(a|a\.|a\-|4|@|&Atilde;|&auml;|&Auml;|&acirc;|&Acirc;|&agrave;|&Agrave;)';
		$leet_replace['b']= '(b|b\.|b\-|8|\|3|&beta;|&szlig;|&Beta;)';
		$leet_replace['c']= '(c|c\.|c\-|&cent;|<|\(|{)';
		$leet_replace['d']= '(d|d\.|d\-|&part;|\|\)|&thorn;)';
		$leet_replace['e']= '(e|e\.|e\-|3|&pound;|&euro;|&ecirc;|&Euml;|&euml;)';
		$leet_replace['f']= '(f|f\.|f\-)';
		$leet_replace['g']= '(g|g\.|g\-|6|9)';
		$leet_replace['h']= '(h|h\.|h\-)';
		$leet_replace['i']= '(i|i\.|i\-|!|\||\]\[|]|1)';
		$leet_replace['j']= '(j|j\.|j\-)';
		$leet_replace['k']= '(k|k\.|k\-)';
		$leet_replace['l']= '(l|1\.|l\-|!|\||\]\[|]|&pound;)';
		$leet_replace['m']= '(m|m\.|m\-)';
		$leet_replace['n']= '(n|n\.|n\-)';
		$leet_replace['o']= '(o|o\.|o\-|0|&omicron;)';
		$leet_replace['p']= '(p|p\.|p\-)';
		$leet_replace['q']= '(q|q\.|q\-)';
		$leet_replace['r']= '(r|r\.|r\-)';
		$leet_replace['s']= '(s|s\.|s\-|5|\$)';
		$leet_replace['t']= '(t|t\.|t\-)';
		$leet_replace['u']= '(u|u\.|u\-)';
		$leet_replace['w']= '(w|w\.|w\-)';
		$leet_replace['x']= '(x|x\.|x\-)';
		$leet_replace['y']= '(y|y\.|y\-|&gamma;|&upsih;|&#165;|&yuml;|&yacute;|&Yacute;)';
		$leet_replace['z']= '(z|z\.|z\-)';
     
        $words = explode(" ", $string);
                
        for ($x=0; $x<count($badwords); $x++) {

        	$replacement[$x] = str_repeat('*',strlen($badwords[$x]));
        	$badwords[$x] =  '/'.str_ireplace(array_keys($leet_replace),array_values($leet_replace), $badwords[$x]).'/i';
        }
        
        $newstring = array();
        $newstring['orig'] = $string;
        $newstring['clean'] =  preg_replace($badwords,$replacement, $newstring['orig']);    

        return $newstring;
           
}