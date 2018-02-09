<?php
$string=file_get_contents('http://moss.stanford.edu/results/542493595');
function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
$dir=scandir("submissions/15");
	$z=2;
	$p=count($dir);
	for($z=2;$z<$p;$z++)
	{
$start=$dir[$z]." (";
$end=")";
$parsed = get_string_between($string,$start, $end);

echo $parsed;
	}

?>