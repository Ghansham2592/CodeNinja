<?php
session_start();
?><?php
if(isset($_POST['submit']))
{
	$x="";
	if(isset($_POST['username']))
	{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
	if(isset($_POST['teacher1']))
	{
	$statement1=$dbcon->prepare("select * from teach_login");
	$statement1->execute();
	$result=$statement1->fetchAll();
	foreach($result as $key)
	{
		if($username==$key['username'] && $password==$key['password'])
		{
			session_start();
			$_SESSION['fullname']=$key['name'];
			$_SESSION['roll_no']=$key['username'];
			header ("location:teacher_profile.php");
			$x="true";
		}	
	}
		if($x=='')
		{
			$message="Incorrect Roll No. and password combination";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	else
	{
	$statement1=$dbcon->prepare("select * from login");
	$statement1->execute();
	$result=$statement1->fetchAll();
	foreach($result as $key)
	{
		if($username==$key['roll_no'] && $password==$key['password'])
		{
			session_start();
			$_SESSION['fullname']=$key['name'];
			$_SESSION['class']=$key['class'];
			$_SESSION['roll_no']=$key['roll_no'];
			header ("location:stud_profile.php");
			$x="true";
			
		}
	}
	if($x=='')
		{
			$message="Incorrect Roll No. and password combination";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CodeMaster</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<!-- jquery is Homepage Only -->
<link rel='stylesheet' id='style-css'  href='layout\styles\diapo.css' type='text/css' media='all'/> 
<script type='text/javascript' src='layout\scripts\jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
<script type='text/javascript' src='layout\scripts\jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='layout\scripts\jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='layout\scripts\diapo.js'></script> 
<link rel="stylesheet" href="pages/lib/codemirror.css">
<script src="pages/lib/codemirror.js"></script>
<script src="pages/addon/edit/matchbrackets.js"></script>
<link rel="stylesheet" href="pages/addon/hint/show-hint.css">
<script src="pages/addon/hint/show-hint.js"></script>
<script src="pages/mode\clike\clike.js"></script>
<style>.CodeMirror {border: 2px inset #dee;}
#selectlist {
	
	top: 0px;
	left:0px;
}
#selectlist select {
	height: 25px;
	font-size: 14pt;
	color: red;
	background: rgb(244,244,244);
}
</style>
<script>
$(function(){
	$('.pix_diapo').diapo();
});

</script>


<!-- ####################################################################################################### -->

</head>
<body id="top">
<div id="d1" class="d">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.php">CodeMaster</a></h1>
      <p>A RAIT Educational Initiative</p>
    </div>
	<?php if( !isset($_SESSION['fullname']))
	{?><form action="" method="POST" id="login">
      <fieldset>
        <div style="position:absolute; left:600px;top:40px;">
		<input type="text" name="username" size="25" style="color:#888;" 
    placeholder="Roll No."/>&nbsp&nbsp
		<input type="password" name="password" size="25" style="color:#888;" 
    placeholder="Password"/><div style="position:absolute;left:0px;top:25px;"><input type="checkbox" name="teacher1" value="1">&nbspTick if you are problem setter&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="image" src="layout/images/button.png" id="signin" alt="Sign In" name="submit" value="submit"/><br>Need <a href="#">Help ?</a> or <a href="#">Forgot Your Details ?</a></div></div>
      </fieldset>
    </form>
	<?php }
	else{ ?><div style="position:absolute; left:750px;top:40px; font-size=12pt;"><?php
		$user=$_SESSION['fullname'];
	echo "Welcome ".$user;?></br></br>
	<a href="logout.php">Log Out</a></div><?php
	}
	?>
 
 </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="tutor.php">Tutorials</a></li>
      <li><a href="#">Practice</a>
        <ul>
          <li><a href="practice.php?diff=1">Easy Problem</a></li>
          <li><a href="practice.php?diff=2">Medium Problem</a></li>
          <li><a href="practice.php?diff=3">Hard Problem</a></li>
        </ul>
      </li>
      <?php if( !isset($_SESSION['fullname']))
	  {
		  ?><li><a href="register.php">Registration</a></li><?php
  }
  else
  { if(!isset($_SESSION['class']))
  {
	  ?><li><a href="teacher_profile.php">Set Problem</a></li>
	  <li><a href="view_lead_index.php">View Leaderboard</a></li><?php
  }
  else{ ?><li><a href="stud_profile.php">Solve Problems</a></li><?php
	  }
  }
  ?>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
</div>