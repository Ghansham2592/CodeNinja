<?php
session_start();
$file_locn = "submissions/".$_SESSION['problemid']."/";
$file= $file_locn.$_SESSION['roll_no'].".txt";
$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$statement1=$dbcon->prepare("select test1i, test2i, test3i, test4i, test5i from problem where problemid=".$_SESSION['problemid']);
		$statement1->execute();
		$result=$statement1->fetchAll();
		foreach($result as $key)
		{
			
?>
<html>
<head>
</head>
<body onLoad = 'document.getElementById("post_form").submit();'>
<form id = "post_form" method = "POST" action = "result_from_sphere.php">
<input type = "hidden" name = "sourceCode" value = '<?php echo file_get_contents($file); ?>' />
<input type = "hidden" name = "language" value = '<?php echo $_SESSION['lang'];?>' />

<input type = "hidden" name = "input" value = '<?php echo $key['test1i'], "\n", $key['test2i'], "\n", $key['test3i'], "\n", $key['test4i'], "\n", $key['test5i']; ?>' />
</form>

</body>
</html>
		<?php }; ?>