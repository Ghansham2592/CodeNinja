<?php
require_once "header.php";
?>
<?php
if(isset($_POST['submit1']))
{
	$title=$_POST['title1'];
	$prob_statement=$_POST['prob_statement'];
	$input=$_POST['input'];
	$output=$_POST['output'];
	$constraints=$_POST['constraints'];
	$example=$_POST['example'];
	$class=$_POST['class'];
	$deadline=$_POST['deadline'];
	$difficulty=$_POST['difficulty'];
	$test1i=$_POST['test1i'];
	$test1o=$_POST['test1o'];
	$test2i=$_POST['test2i'];
	$test2o=$_POST['test2o'];
	$test3i=$_POST['test3i'];
	$test3o=$_POST['test3o'];
	$test4i=$_POST['test4i'];
	$test4o=$_POST['test4o'];
	$test5i=$_POST['test5i'];
	$test5o=$_POST['test5o'];
	$user=$_SESSION['fullname'];
	$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
	$statement=$dbcon->prepare("INSERT INTO problem (title,prob_statement,input,output,constraints,example,class,deadline,difficulty,username,test1i,test1o,test2i,test2o,test3i,test3o,test4i,test4o,test5i,test5o) VALUES (:title,:prob_statement,:input,:output,:constraints,:example,:class,:deadline,:difficulty,:username,:test1i,:test1o,:test2i,:test2o,:test3i,:test3o,:test4i,:test4o,:test5i,:test5o)");
	$statement->execute(array('title'=>$title, 'prob_statement'=>$prob_statement, 'input'=>$input, 'output'=>$output, 'constraints'=>$constraints, 'example'=>$example, 'class'=>$class, 'deadline'=>$deadline, 'difficulty'=>$difficulty,'username'=>$user,'test1i'=>$test1i,'test1o'=>$test1o,'test2i'=>$test2i,'test2o'=>$test2o,'test3i'=>$test3i,'test3o'=>$test3o,'test4i'=>$test4i,'test4o'=>$test4o,'test5i'=>$test5i,'test5o'=>$test5o));
			header("Location:teach_response.php");

}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text\javascript" src="layout\scripts\jquery.validate.min.js"></script>
<script type="text\javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#problem-form").validate({
                rules: {
                    title1: "required",
                    prob_statement: "required",
					input: "required",
					output: "required",
					constraints: "required",
					example: "required",
					test1: "required",
					test2: "required",
					test3: "required",
					test4: "required",
					test5: "required"
                    
                },
                messages: { 
                    title1: "<br>Please enter your name",
                    prob_statement: " <br>Please enter your roll_no",
					input: "<br>Please enter your name",
                    output: "<br>Please enter your name",
                    constraints: "<br>Please enter your name",
                    example: "<br>Please enter your name",
                    test1: "<br>Please enter your name",
                    test2: "<br>Please enter your name",
					test3: "<br>Please enter your name",
					test4: "<br>Please enter your name",
					test5: "<br>Please enter your name"
  
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
<form method="POST" action="" id="problem-form" novalidate="novalidate">
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
     
	  <h2 class="title"><strong>Problem Statement</strong></h2>
	  <b style="font-size:12pt; color:black;"><label for="problem title">Problem Title</label></b></br>
	  <input type="text" name="title1" id="title1" style="height:25px;font-size:12pt;" size="60"></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Problem Statement">Problem Statement</label></b></br>
	  <textarea name="prob_statement" id="prob_statement"rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="input">input</label></b></br>
	  <textarea name="input" id="input"  rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Output">Output</label></b></br>
	  <textarea name="output" id="output" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Constraints">Constraints</label></b></br>
	  <textarea name="constraints" id="constraints" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Example">Example</label>Example</b></br>
	  <textarea name="example" id="example" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Test Case1">Test Case 1 Input</label></br>
	  <textarea name="test1i" id="test1i" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  <b style="font-size:12pt; color:black;"><label for="Test Case1">Test Case 1 Output</label></br>
	  <textarea name="test1o" id="test1o" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Test Case2">Test Case 2 Input</label></b></br>
	  <textarea name="test2i" id="test2i" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  <b style="font-size:12pt; color:black;"><label for="Test Case2">Test Case 2 Output</label></b></br>
	  <textarea name="test2o" id="test2o" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Test case3">Test Case 3 Input</label></b></br>
	  <textarea name="test3i" id="test3i" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  <b style="font-size:12pt; color:black;"><label for="Test Case3">Test Case 3 Output</label></b></br>
	  <textarea name="test3o" id="test3o" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Test Case4">Test Case 4 Input</label></b></br>
	  <textarea name="test4i" id="test4i" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  <b style="font-size:12pt; color:black;"><label for="Test Case4">Test Case 4 Output</label></b></br>
	  <textarea name="test4o" id="test4o" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;"><label for="Test case5">Test case 5 Input</label></b></br>
	  <textarea name="test5i" id="test5i" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  <b style="font-size:12pt; color:black;"><label for="Test Case5">Test Case 5 Output</label></b></br>
	  <textarea name="test5o" id="test5o" rows="6" cols="60" style="font-size:12pt;"></textarea></br></br>
	  
	  <b style="font-size:12pt; color:black;">Class</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b style="font-size:12pt; color:black;">Deadline date</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b style="font-size:12pt; color:black;">Difficulty</b><br>
	  <select name="class" style="height:30px;font-size:12pt;">
	  <option value="1">FE</option>
	  <option value="2">SE</option>
	  <option value="3">TE</option>
	  <option value="4">BE</option>
	  </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	  <input type="date" name="deadline" style="height:25px;font-size:12pt;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="difficulty" style="height:30px;font-size:12pt;">
	  <option value="1" selected >Easy</option>
	  <option value="2">Medium</option>
	  <option value="3">Hard</option>
	  </select>
		</br></br>
		<input type="image" src="layout/images/submit.png " alt="submit" name="submit1" value="submit"/>
	  
	 
	</div>
	</div>
</div>
</form>
</body>
</html>
<?php require_once "footer1.html";
?>