<?php require_once "header.php";?>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$password=$_POST['password'];
	$roll_no=$_POST['roll_no'];
	$class=$_POST['class'];
	$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
	$statement1=$dbcon->prepare("SELECT roll_no,password FROM login");
	$statement1->execute();
	$result=$statement1->fetchAll();
	$x="";
	foreach($result as $key)
	{
		if($roll_no==$key['roll_no'] && $password==$key['password'])
		{
			$message="Student already registered! Please login using roll no. and password";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$x="true";
		}
	}
	if($x=='')
	{
	$statement=$dbcon->prepare("INSERT INTO login (name,password,roll_no,class) VALUES (:name,:password,:roll_no,:class)");
	$statement->execute(array('name'=>$name, 'password'=>$password, 'roll_no'=>$roll_no, 'class'=>$class));
	header("Location:reg_response.php");
	}
}

?>
<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script type="text/javascript" src="layout\scripts\jquery.validate.min.js"></script>

<title></title>

<style>
label {
	color: #464646;
	text-shadow: 0 1px 0 #fff;
	font-size: 14px;
	font-weight: bold;
    width:180px;
    clear:left;
    text-align:left;
    padding-right:15px;

}
</style>
<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    name: "required",
                    roll_no: "required",
                    
                    password: {
                        required: true,
                        minlength: 5
                    },
					password1:{
						required: true,
						equalTo: '#password',
						minlength: 5
					}
					
                    
                },
                messages: { 
                    name: "<br>Please enter your name",
                    roll_no: " <br>Please enter your roll_no",
                    password: {
                        required: "<br>Please provide a password",
                        minlength: "<br>Your password must be at least 5 characters long"
                    },
					password1: {
						required : "<br>Please confirm your password",
						equalTo : "<br>Confirm password must match your password",
						minlength: "<br>Your password must be at least 5 characters long"
					}
                    
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
</head>
<body>
<form action="" method="post" id="register-form" novalidate="novalidate">

<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
	  <h2 class="title"><strong>Register</strong></h2>
	  <b style="font-size:12pt; color:black;"><label for="firstname">Name</label></b></br><input type="text" size="40px" name="name" id="name" placeholder ="Full Name" style="height:25px;font-size:12pt; color:#000;" 
     /></br></br>
	  <label name="class">Class</label>&nbsp;&nbsp;</b><b style="font-size:12pt; color:black;"><label for="roll_no"> Roll Number</label><br>
	  
	  
	  <select id="class" name="class" style="height:30px;font-size:12pt; ">
	  <option value="1" >FE</option>
	  <option value="2" >SE</option>
	  <option value="3" >TE</option>
	  <option value="4" >BE</option>
	  </select>&nbsp;&nbsp;
	  <input type="text" size="25px"  name="roll_no" id="roll_no" style="height:25px;font-size:12pt;color:#000;" placeholder="Roll No." /> 
	  </br></br>
	  <b style="font-size:12pt; color:black;"><label for="password">Password</label></b></br>
	  <input type="password" size="25px"  name="password" id="password" style="height:25px;font-size:12pt; " placeholder="Password" /></br></br>
	  <b style="font-size:12pt; color:black;"><label name="password1">Confirm Password</label></b></br>
	  <input type="password" size="25px"  name="password1" id="password1" style="height:25px;font-size:12pt; " placeholder="Confirm Password" /></br></br>
	  <input type="image" src="layout/images/submit.png" alt="submit" name="submit" id="submit" value="submit" />
	                

	  </br>
	  </form>
	  
	</div>
</div>
</div>
</body>	  
<?php require_once "footer1.html"?>