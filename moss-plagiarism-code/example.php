<?php
include("moss.php");
$userid = 739420835; // Enter your MOSS userid
$mode="true";
$moss = new MOSS($userid);
$moss->setLanguage('java');
$moss->addByWildcard('test/*');
$url = $moss->send();
print_r($url);
?>