<?php

 //$file = file_get_contents("http://games.espn.go.com/ffl/leaders?&slotCategoryId=2&proTeamId=16");
$myUrl = "http://www.example.com";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$myUrl);
$result = curl_exec($ch);
curl_close($ch); 



echo $result;
//$re = "/<table.*playerTableTable.*>.*<\/table>/i"; 
	
$re = "/domain.*illustrative/i"; ; 
preg_match_all($re, $result, $matches, PREG_PATTERN_ORDER);

echo $out[0][0] . ", " . $out[0][1] . "\n";





?>