<?php require_once "header.php";
?>
<html>
<body>
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      
        <h2 class="title"><strong>Result</strong></h2>
		<?php if($_GET['error']=="ok")
		{
			
		$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$statement1=$dbcon->prepare("select * from time where pid=".$_SESSION['problemid']." AND roll_no='".$_SESSION['roll_no']."'");
		$statement1->execute();
		$result=$statement1->fetchAll();
		foreach($result as $key)
		{
			?><h3>Successfully Executed</h3></br>
			<h3>Execution Time</h3></br><?php echo $key['exec_time'];?>
			<h3>Memory Used </h3></br><?php echo $key['mem_used'];
		}
		}
		else
		{
			echo $_SESSION['cmpinfo']." ".$_SESSION['stderr'];
		}
		
		?>
			</div>
		</div>
	</div>
	</body>
</html>
