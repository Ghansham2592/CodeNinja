<?php
session_start();
$pid=intval($_GET['pid']);
$marks=0;
$executed="";
	$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
	$statement1=$dbcon->prepare("SELECT deadline FROM problem where problemid=".$pid);
	$statement1->execute();
	$result=$statement1->fetchAll();
	foreach($result as $key)
	{
	if((strtotime(date("Y/m/d"))-strtotime($key['deadline']))>=0)
	
	{
		include("moss.php");
		$userid = "443027296";
		$mode="true";
		$moss = new MOSS($userid);
		$moss->setLanguage('java');
		$directory="submissions/".$pid."/*";
		$moss->addByWildcard($directory);
		$url = $moss->send();
		print_r($url);
		$string=file_get_contents(trim($url)."/");
		function get_string_between($string, $start, $end){
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
		}
	function mb_stripos_all($haystack, $needle) {
 
	$s = 0;
	$i = 0;
	
	while(is_integer($i)) {
	
		$i = mb_stripos($haystack, $needle, $s);
	
		if(is_integer($i)) {
		$aStrPos[] = $i;
		$s = $i + mb_strlen($needle);
		}
	}
	
	if(isset($aStrPos)) {
		return $aStrPos;
	} else {
		return false;
	}
	}
	$dir=scandir("submissions/".$pid);
		$z=2;
		$p=count($dir);
		for($z=2;$z<$p;$z++)
		{
		$result=mb_stripos_all($string,$dir[$z]);
		$temp=count($result);
		$tp=0;
		$tp1=array();
		for($y=0;$y<$temp;$y++){
		$mstr=substr($string,$result[$y],(strlen($dir[$z])+6));
		$tp1[$tp++]= intval(get_string_between($mstr,$dir[$z]." (","%"));
		}
		$res=max($tp1);
		$statement4 = $dbcon->prepare("INSERT INTO plagiarism(pid, filename, plag_percent) VALUES('".$pid."','".$dir[$z]."','".$res."')");
		$statement4->execute();		
		}
		}
	}
	echo "Successfully entered plagiarised code percent in database";
	header('location: view_lead.php?problemid='.$pid);
	
?>