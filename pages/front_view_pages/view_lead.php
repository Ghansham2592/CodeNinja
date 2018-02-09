<?php
require_once "header.php";
$pid=intval($_GET['problemid']);
?>
<html>
<body>
<div class="wrapper row9">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      
        <h2 class="title"><strong>Leaderboard</strong></h2>
			
			<?php 
			$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
			$statement = $dbcon->prepare("SELECT plag_percent,p.filename,timestamp, score, mem_used, exec_time from plagiarism p, time t where p.pid= t.pid and p.filename = t.filename and p.pid =".$pid);
			$statement->execute();
			$result=$statement->fetchAll();?>
			<table>
				<tr>
					<td>Name</td>
					<td>Score</td>
					<td>Plagiarism Percentage</td>
					<td>Timestamp</td>
					<td>Memory Used</td>
					<td>Execution Time(in secs)</td>
				</tr><?php
			foreach($result as $key)
			{
				$roll_no_temp=substr($key['filename'],0,8);
				$statement2=$dbcon->prepare("select name FROM login where roll_no='".$roll_no_temp."'");
				$statement2->execute();
				$result2=$statement2->fetchAll();
				?>
				<tr><?php
				foreach($result2 as $key2)
			{ ?>
					<td><?php echo $key2['name'];?></td><?php 
			}?>
			
			<td><?php echo $key['score'];?></td>
			<td><?php echo $key['plag_percent'];?></td>
			<td><?php echo $key['timestamp'];?></td>
			<td><?php echo $key['mem_used'];?></td>
			<td><?php echo $key['exec_time'];?></td>
			</tr><?php 
			}?>
			</table>
			</div>
		</div>
	</div>
	</body>
</html>