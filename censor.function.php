<?php
function censorString($string, $badwords) {  
              
		$leet_replace = array();
		$leet_replace['a']= '(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|α)';
		$leet_replace['b']= '(b|b\.|b\-|8|\|3|ß|Β|β)';
		$leet_replace['c']= '(c|c\.|c\-|Ç|ç|¢|€|<|\(|{)';
		$leet_replace['d']= '(d|d\.|d\-|&part;|\|\)|Þ|Ð)';
		$leet_replace['e']= '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê)';
		$leet_replace['f']= '(f|f\.|f\-)';
		$leet_replace['g']= '(g|g\.|g\-|6|9)';
		$leet_replace['h']= '(h|h\.|h\-)';
		$leet_replace['i']= '(i|i\.|i\-|!|\||\]\[|]|1)';
		$leet_replace['j']= '(j|j\.|j\-)';
		$leet_replace['k']= '(k|k\.|k\-)';
		$leet_replace['l']= '(l|1\.|l\-|!|\||\]\[|]|£)';
		$leet_replace['m']= '(m|m\.|m\-)';
		$leet_replace['n']= '(n|n\.|n\-)';
		$leet_replace['o']= '(o|o\.|o\-|0|Ο|ο|Φ)';
		$leet_replace['p']= '(p|p\.|p\-|ρ|Ρ)';
		$leet_replace['q']= '(q|q\.|q\-)';
		$leet_replace['r']= '(r|r\.|r\-|®)';
		$leet_replace['s']= '(s|s\.|s\-|5|\$|§)';
		$leet_replace['t']= '(t|t\.|t\-)';
		$leet_replace['u']= '(u|u\.|u\-|υ)';
		$leet_replace['w']= '(w|w\.|w\-)';
		$leet_replace['x']= '(x|x\.|x\-|Χ|χ)';
		$leet_replace['y']= '(y|y\.|y\-|¥|γ|ÿ|ý)';
		$leet_replace['z']= '(z|z\.|z\-|Ζ)';
     
        $words = explode(" ", $string);
                
        for ($x=0; $x<count($badwords); $x++) {

        	$replacement[$x] = str_repeat('*',strlen($badwords[$x]));
        	$badwords[$x] =  '/'.str_ireplace(array_keys($leet_replace),array_values($leet_replace), $badwords[$x]).'/i';
        }
        
        $newstring = array();
        $newstring['orig'] = html_entity_decode($string);
        $newstring['clean'] =  preg_replace($badwords,$replacement, $newstring['orig']);    
        
        print_r($badwords);
        return $newstring;
           
}