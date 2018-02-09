<?php
require_once "header.php";
?>
<html>
<body>
<div class="wrapper row9">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      
        <h2 class="title"><strong>Problems</strong></h2>
		<?php
$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
$statement=$dbcon->prepare("select * from problem where username='".$_SESSION['fullname']."'");
$statement->execute();
$result=$statement->fetchAll();
foreach($result as $key)
	{
		?><ul><li><a href="plag.php?problemid=<?php echo $key['problemid'];?>"><?php echo $key['title'];?></a></li></ul></br>
<?php

	}

?>
</div>
</div>
</div>
</body>
</html>
<?php require_once "footer1.html";
?>
