<?php require_once "header.php";
$_SESSION['problemid'] = $_GET['problemid'];
$temp_lang="1";
$filepath="";
if(isset($_POST['lang']))
{
	$temp_lang=$_POST['lang'];
	$_SESSION['lang']=$temp_lang;
}

$sl1=$sl2=$sl3=$sl4=$sl6=$sl7=$sl8=$sl10=$sl11=$sl12=$sl13=$sl14=$sl15=$sl16=$sl17=$sl18=$sl19=$sl20=$sl21=$sl23=$sl24=$sl25="";
$id1="";
switch($temp_lang)
{
	case "11":
	$sl1="selected";
	$id1="ace/mode/c_cpp";
	break;
	case "1":
	$sl2="selected";
	$id1="ace/mode/c_cpp";
	break;
	case "111":
	$sl3="selected";
	$id1="ace/mode/clojure";
	break;
	case "118":
	$sl4="selected";
	$id1="ace/mode/cobol";
	break;
	
	case "102":
	$sl6="selected";
	$id1="ace/mode/d";
	break;
	case "36":
	$sl7="selected";
	$id1="ace/mode/erlang";
	break;
	case "107":
	$sl8="selected";
	$id1="ace/mode/forth";
	break;
	
	case "114":
	$sl10="selected";
	$id1="ace/mode/golang";
	break;
	case "121":
	$sl11="selected";
	$id1="ace/mode/groovy";
	break;
	case "21":
	$sl12="selected";
	$id1="ace/mode/haskell";
	break;
	case "35":
	$sl13="selected";
	$id1="ace/mode/javascript";
	break;
	case "26":
	$sl14="selected";
	$id1="ace/mode/lua";
	break;
	case "2":
	$sl15="selected";
	$id1="ace/mode/pascal";
	break;
	case "3":
	$sl16="selected";
	$id1="ace/mode/perl";
	break;
	case "29":
	$sl17="selected";
	$id1="ace/mode/php";
	break;
	case "116":
	$sl18="selected";
	$id1="ace/mode/python";
	break;
	case "117":
	$sl19="selected";
	$id1="ace/mode/r";
	break;
	case "17":
	$sl20="selected";
	$id1="ace/mode/ruby";
	break;
	case "33":
	$sl21="selected";
	$id1="ace/mode/scheme";
	break;
	
	case "38":
	$sl23="selected";
	$id1="ace/mode/tcl";
	break;
	case "10":
	$sl24="selected";
	$id1="ace/mode/java";
	break;
	case "39":
	$sl25="selected";
	$id1="ace/mode/scala";
	break;
	

	default :
	$sl2="selected";
	$id1="ace/mode/c_cpp";
	break;
	
	
}
if(isset($_POST['submit2']))
{
	
	$name=$_SESSION['roll_no'];
	$filepath="submissions/".$_SESSION['problemid']."/".$name.$extension;
	if(file_exists("submissions/".$_SESSION['problemid'])){
	$myfile = fopen($filepath, "w") or die("Unable to open file!");
	$txt = $_POST['code'];
	fwrite($myfile, $txt);
	fclose($myfile);
	}
	else
	{
		mkdir("submissions/".$_SESSION['problemid'],0777);
		$myfile = fopen($filepath, "w") or die("Unable to open file!");
		$txt = $_POST['code'];
		fwrite($myfile, $txt);
		fclose($myfile);
	}
	
	header('location: sphere_test.php');
}
?>
<head>

<style type="text/css" media="screen">
    #editor { 
        height: 320px;
        top: 0;
		width: 920px;
		display:block;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>


<script>

function change(){
    document.getElementById("selectlist1").submit();
}
</script>
</head>
<body>
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      
        <h2 class="title"><strong><?php 
		$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$statement1=$dbcon->prepare("select * from problem");
		$statement1->execute();
		$result=$statement1->fetchAll();
		foreach($result as $key)
		{
			if($_GET['problemid']==$key['problemid'] && $_SESSION['class']==$key['class'])
			{
				 echo $key['title'];
			
			}
		}?></strong></h2>
		<?php 
		foreach($result as $key)
		{
			if($_GET['problemid']==$key['problemid'] && $_SESSION['class']==$key['class'])
			{
				?><h3>Problem Statement</h3></br><?php echo nl2br($key['prob_statement']);?>
				<h3>Input Sample</h3></br><?php echo nl2br($key['input']);?>
				<h3>Output Sample</h3></br><?php echo nl2br($key['output']);?>
				<h3>Constraints</h3></br><?php echo nl2br($key['constraints']);?>
				<h3>Example</h3></br><?php echo nl2br($key['example']);?></br>
				
		<?php	
			}
		}?>
		<div class="wrapper row4">
  <div id="container" class="clear"> 
	<form id="selectlist1" method="GET" action = "">
	<div id = "selectlist">
	<select name = "lang" id="lang" onchange="change()">
	<option value="11" <?php echo $sl1;?>>C</option>
	<option value="1" <?php echo $sl2;?> >C++</option>
	<option value="10" <?php echo $sl24;?>>Java</option>
    <option value="111" <?php echo $sl3;?>>Clojure</option>
    <option value="118"<?php echo $sl4;?>>COBOL</option>
    <option value="102"<?php echo $sl6;?>>D</option>
    <option value="36" <?php echo $sl7;?>>Erlang</option>
    <option value="107" <?php echo $sl8;?>>Forth</option>
    <option value="114" <?php echo $sl10;?>>Go</option>
    <option value="121" <?php echo $sl11;?>>Groovy</option>
    <option value="21" <?php echo $sl12;?>>Haskell</option>
    <option value="35" <?php echo $sl13;?>>JavaScript (rhino)</option>
    <option value="26" <?php echo $sl14;?>>Lua</option>
    <option value="2" <?php echo $sl15;?>>Pascal</option>
    <option value="3" <?php echo $sl16;?>>Perl</option>
    <option value="29" <?php echo $sl17;?>>PHP</option>
    <option value="116" <?php echo $sl18;?>>Python</option>
    <option value="117" <?php echo $sl19;?>>R</option>
    <option value="17" <?php echo $sl20;?>>Ruby</option>
    <option value="33" <?php echo $sl21;?>>Scheme</option>
    <option value="38" <?php echo $sl23;?>>Tcl</option>
	<option value="39" <?php echo $sl25;?>>Scala</option>
                </select> 
	</div>
	</br>
	</form>
<form name="code-form" method="post" action="problem.php?problemid=<?php echo $_SESSION['problemid']; ?>">
<input type="hidden" name="lang" value="<?php echo $temp_lang;?>"></input>
<input type="hidden" id="code" name="code" ></input>
<div id="editor"> </div></br>
  	  <input type="image" src="layout/images/submit.png" alt="submit" name="submit2" id="submit2" value="submit" onclick="document.getElementById('code').value=editor.getValue(); return true;"/>

</form>

<script src="ace-builds-master\ace-builds-master\src-noconflict\ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/terminal");
    editor.getSession().setMode("<?php echo $id1;?>");
</script>



</div>
		
		</div>
		</div>
		</div>

</body>
</html>
<?php require_once "footer1.html";?>
