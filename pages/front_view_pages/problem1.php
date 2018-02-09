<?php require_once "header.php";?>
<?php
$temp_lang="1";
$extension="";
$filepath="";
if(isset($_POST['lang']))
{
	$temp_lang=$_POST['lang'];
}

$sl1=$sl2=$sl3=$sl4=$sl5=$sl6=$sl7=$sl8=$sl9=$sl10=$sl11=$sl12=$sl13=$sl14=$sl15=$sl16=$sl17=$sl18=$sl19=$sl20=$sl21=$sl22=$sl23=$sl24="";
$id1="";
switch($temp_lang)
{
	case "11":
	$sl1="selected";
	$id1="c-code";
	break;
	case "1":
	$sl2="selected";
	$id1="cpp-code";
	break;
	case "111":
	$sl3="selected";
	$id1="clojure-code";
	break;
	case "118":
	$sl4="selected";
	$id1="cobol-code";
	break;
	case "32":
	$sl5="selected";
	$id1="clisp-code";
	break;
	case "102":
	$sl6="selected";
	$id1="d-code";
	break;
	case "36":
	$sl7="selected";
	$id1="erlang-code";
	break;
	case "107":
	$sl8="selected";
	$id1="forth-code";
	break;
	case "5":
	$sl9="selected";
	$id1="fortran-code";
	break;
	case "114":
	$sl10="selected";
	$id1="go-code";
	break;
	case "121":
	$sl11="selected";
	$id1="groovy-code";
	break;
	case "21":
	$sl12="selected";
	$id1="haskell-code";
	break;
	case "35":
	$sl13="selected";
	$id1="javascript-code";
	break;
	case "26":
	$sl14="selected";
	$id1="lua-code";
	break;
	case "2":
	$sl15="selected";
	$id1="pascal-code";
	break;
	case "3":
	$sl16="selected";
	$id1="perl-code";
	break;
	case "29":
	$sl17="selected";
	$id1="php-code";
	break;
	case "116":
	$sl18="selected";
	$id1="python-code";
	break;
	case "117":
	$sl19="selected";
	$id1="r-code";
	break;
	case "17":
	$sl20="selected";
	$id1="ruby-code";
	break;
	case "33":
	$sl21="selected";
	$id1="scheme-code";
	break;
	case "23":
	$sl22="selected";
	$id1="smalltalk-code";
	break;
	case "38":
	$sl23="selected";
	$id1="tcl-code";
	break;
	case "10":
	$sl24="selected";
	$id1="java-code";
	break;
	default :
	$sl2="selected";
	$id1="cpp-code";
	break;
	
	
}
if(isset($_POST['submit2']))
{
	$temp=$_GET['problemid'];
	$name=$_SESSION['roll_no'];
	$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$time=gmdate('Y-m-d h:i:s \G\M\T');
	if($temp_lang=="11")
		$extension=".c";
	else if($temp_lang=="1")
		$extension=".cpp";
	else if($temp_lang=="14")
		$extension=".c";
	else if($temp_lang=="111")
		$extension=".clj";
	else if($temp_lang=="118")
		$extension=".cbl";
	else if($temp_lang=="32")
		$extension=".cl";
	else if($temp_lang=="102")
		$extension=".d";
	else if($temp_lang=="36")
		$extension=".erl";
	else if($temp_lang=="107")
		$extension=".fo";
	else if($temp_lang=="5")
		$extension=".f";
	else if($temp_lang=="114")
		$extension=".g";
	else if($temp_lang=="121")
		$extension=".gv";
	else if($temp_lang=="21")
		$extension=".hs";
	else if($temp_lang=="10")
		$extension=".java";
	else if($temp_lang=="35")
		$extension=".js";
	else if($temp_lang=="26")
		$extension=".lua";
	else if($temp_lang=="2")
		$extension=".pas";
	else if($temp_lang=="3")
		$extension=".pl";
	else if($temp_lang=="29")
		$extension=".php";
	else if($temp_lang=="108")
		$extension=".prl";
	else if($temp_lang=="116")
		$extension=".pyc";
	else if($temp_lang=="117")
		$extension=".r";
	else if($temp_lang=="17")
		$extension=".rb";
	else if($temp_lang=="33")
		$extension=".scheme";
	else if($temp_lang=="23")
		$extension=".st";
	else if($temp_lang=="38")
		$extension=".tcl";
	$filepath="submissions/".$temp."/".$name.$extension;
	if(file_exists($filepath))
	{
		$statement1=$dbcon->prepare("UPDATE time SET timestamp='".$time."'WHERE pid=".$temp." AND roll_no='".$name."' AND filename='".$name.$extension."'");
		$statement1->execute();
	}
	else{
	$statement1=$dbcon->prepare("INSERT INTO time (pid,roll_no,timestamp,filename) VALUES (:pid,:roll_no,:timestamp,:filename)");
	$statement1->execute(array('pid'=>$temp,'roll_no'=>$name,'timestamp'=>$time,'filename'=>$name.$extension));
	}
	if(file_exists("submissions/".$temp)){
	$myfile = fopen($filepath, "w") or die("Unable to open file!");
	$txt = $_POST['code'];
	fwrite($myfile, $txt);
	fclose($myfile);
	}
	else
	{
		mkdir("submissions/".$temp,0777);
		$myfile = fopen($filepath, "w") or die("Unable to open file!");
	$txt = $_POST['code'];
	fwrite($myfile, $txt);
	fclose($myfile);
	}
		
	
}
?>
<head>
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
      <div class="fl_left">
        <h2 class="title"><strong><?php 
		$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
		$statement1=$dbcon->prepare("select * from problem");
		$statement1->execute();
		$result=$statement1->fetchAll();
		foreach($result as $key)
		{
			if($_GET['problemid']==$key['problemid'] && $_SESSION['class']==$key['class'])
			{
				?><?php echo $key['title'];?><?php
			
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
	<form id="selectlist1" method="POST">
	<div id = "selectlist">
	<select name = "lang" id="lang" onchange="change()">
	<option value="11" <?php echo $sl1;?>>C</option>
	<option value="1" <?php echo $sl2;?> >C++</option>
    <option value="111" <?php echo $sl3;?>>Clojure</option>
    <option value="118"<?php echo $sl4;?>>COBOL</option>
	<option value="32" <?php echo $sl5;?>>Common Lisp</option>
    <option value="102"<?php echo $sl6;?>>D</option>
    <option value="36" <?php echo $sl7;?>>Erlang</option>
    <option value="107" <?php echo $sl8;?>>Forth</option>
    <option value="5" <?php echo $sl9;?>>Fortran</option>
    <option value="114" <?php echo $sl10;?>>Go</option>
    <option value="121" <?php echo $sl11;?>>Groovy</option>
    <option value="21" <?php echo $sl12;?>>Haskell</option>
    <option value="10" <?php echo $sl24;?>>Java</option>
    <option value="35" <?php echo $sl13;?>>JavaScript (rhino)</option>
    <option value="26" <?php echo $sl14;?>>Lua</option>
    <option value="2" <?php echo $sl15;?>>Pascal</option>
    <option value="3" <?php echo $sl16;?>>Perl</option>
    <option value="29" <?php echo $sl17;?>>PHP</option>
    <option value="116" <?php echo $sl18;?>>Python</option>
    <option value="117" <?php echo $sl19;?>>R</option>
    <option value="17" <?php echo $sl20;?>>Ruby</option>
    <option value="33" <?php echo $sl21;?>>Scheme</option>
    <option value="23" <?php echo $sl22;?>>Smalltalk</option>
    <option value="38" <?php echo $sl23;?>>Tcl</option>
                </select> 
	</div>
	</form>
    <article>
<div>
<form method ="POST" action = "">
<input type="hidden" value="<?php echo $temp_lang;?>" name="lang" />
<textarea name="code" style= "width: 800px; height: 550px;" id="<?php echo $id1;?>">
<?php
	$temp=$_GET['problemid'];
	$name=$_SESSION['roll_no'];
if(file_exists($filepath))
{	
if(isset($_POST['submit1']))
{
	
	$myfile = fopen($filepath, "r") or die("Unable to open file!");
echo fread($myfile,filesize($filepath));
fclose($myfile);
}
}
?>
</textarea>
	<script>
      var cEditor = CodeMirror.fromTextArea(document.getElementById("<?php echo $id1;?>"), {
        lineNumbers: true,
        matchBrackets: true,
      });
		var mac = CodeMirror.keyMap.default == CodeMirror.keyMap.macDefault;
      CodeMirror.keyMap.default[(mac ? "Cmd" : "Ctrl") + "-Space"] = "autocomplete";
    </script>
	<br />
    <input type="image" src="layout/images/submit.png" alt="submit" name="submit2" value="submit"/>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OR &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Upload a file:<input type="file" name="Browse" /><input type="submit" value="Load Provious Code" name="submit1">
	</div>
</article>
</form>    
  </div>
</div>
		</div>
		</div>
		</div>
		</div>
</body>
</html>
<?php require_once "footer1.html";?>
