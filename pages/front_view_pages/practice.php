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
		$dif=$_GET['diff'];
		$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$statement1=$dbcon->prepare("select * from problem where difficulty=:difficulty");
		$statement1->execute(array(
                'difficulty' => $_GET['diff']
	));
		$result=$statement1->fetchAll();
		foreach($result as $key)
		{
			
				?><ul><li><a href="problem.php?problemid=<?php echo $key['problemid'];?>"><?php echo $key['title'];?></a></li></ul></br><?php
			
			}
		?>
		
	  </div>
	</div>
	</div>

</body>
</html>
<?php require_once "footer2.html";?>
