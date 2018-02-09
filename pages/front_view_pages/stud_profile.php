<?php
require_once "header.php";
?>
<!DOCTYPE html>
<head>
	</title></title>
	
</head>
<body>
<div class="wrapper row9">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      
        <h2 class="title"><strong>Problems</strong></h2>
		<?php 
		$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$statement1=$dbcon->prepare("select * from problem");
		$statement1->execute();
		$result=$statement1->fetchAll();
		foreach($result as $key)
		{
			if(($_SESSION['class']==$key['class']) && ((strtotime($key['deadline']) - strtotime(date("Y/m/d"))))>=0)
			{	
				?><ul><li><a href="problem.php?problemid=<?php echo $key['problemid'];?>"><?php echo $key['title'];?></a></li></ul></br><?php
			
			}
		}
		?>
		
	  
	 </div>
	</div>
</div></br>
</html>
<?php
require_once "footer2.html";
?>