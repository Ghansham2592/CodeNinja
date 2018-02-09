<?php
if(isset($_POST['submit']))
{
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
			
		}
		
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
			
		}
		
		
	}
	}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<script>
$(function(){
	$('.pix_diapo').diapo();
});

</script>
<script>
function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}
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
	<form action="" method="POST" id="login">
      <fieldset>
        <div style="position:absolute; left:600px;top:40px;">
		<input type="text" name="username" size="25" style="color:#888;" 
     placeholder="Roll No.:"/>&nbsp&nbsp
		<input type="password" name="password" size="25" style="color:#888;" 
    "/><div style="position:absolute;left:0px;top:25px;"><input type="checkbox" name="teacher1" value="1">&nbspTick if you are problem setter&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="image" src="layout/images/button.png" id="signin" alt="Sign In" name="submit" value="submit"/><br>Need <a href="#">Help ?</a> or <a href="#">Forgot Your Details ?</a></div>
      </fieldset>
    </form>
 </div>
 </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="pages/style-demo.html">Tutorials</a></li>
      <li><a href="#">Practice</a>
        <ul>
          <li><a href="#">Easy Problem</a></li>
          <li><a href="#">Medium Problem</a></li>
          <li><a href="#">Hard Problem</a></li>
        </ul>
      </li>
      <li><a href="register.php">Registration</a></li>
      <li class="last"><a href="pages/gallery.html">Gallery</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
</div>
</body>
</html>