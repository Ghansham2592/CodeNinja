<?php
session_start();
$filepath = "submissions/".$_SESSION['problemid']."/".$_SESSION['roll_no'].".txt";
if(isset($_POST['sourceCode']))
{
$url = "http://api.compilers.sphere-engine.com/api/3/submissions?access_token=853405ec54858313123af03a4a62a150" ;
$ch = curl_init($url);
$params = array(
	'sourceCode' => $_POST['sourceCode'],
	'language' => $_POST['language'],
	'input' => $_POST['input']
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_array = json_decode($result, true);
$result = $result_array['id'];
$url = "http://api.compilers.sphere-engine.com/api/3/submissions/".$result."?access_token=853405ec54858313123af03a4a62a150" ;
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url.'',
    CURLOPT_USERAGENT => 'cURL Request for Result.'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
$url = "http://api.compilers.sphere-engine.com/api/3/submissions/".$result."?access_token=853405ec54858313123af03a4a62a150&withStderr=1&withOutput=1&withCmpinfo=1&withSource=1&withInput=1" ;
$status = -5;
while($status != "0")
{
$from_comp = file_get_contents($url);
$comp_array = json_decode($from_comp, true);
$status = $comp_array['status'];	
}
if($comp_array['result'] != 15)
{
	header('location: result.php?error=found');
	//Make /../result.php to display the result from Sphere Engine in case of error in submitted code.
}
else
{
$time = $comp_array['date'];
$exec_time = $comp_array['time'];
$mem_used = $comp_array['memory'];
$output = $comp_array['output'];
$stderr = $comp_array['stderr'];
$cmpinfo = $comp_array['cmpinfo'];
$_SESSION['stderr'] = $stderr;
$_SESSION['cmpinfo'] = $cmpinfo;
echo '<pre>', $output, '</pre>';
die();
//Check if output contains formatted output or with newline character.

	$dbcon=new PDO("mysql:host=localhost;dbname=teacher", 'root', '');
	$statement2=$dbcon->prepare("SELECT test1o,test2o,test3o,test4o,test5o from problem where problemid=".$_SESSION['problemid']);
	$statement2->execute();
	$result1 = $statement2->fetchAll();
	//separate test output cases and match with Sphere Engine result. Count no. of matches
	$statement3=$dbcon->prepare("SELECT pid FROM time WHERE pid = ".$_SESSION['problemid']);
	$statement3->execute();
	$result3 = $statement3->fetchAll();
	if(empty($result3))
	{
		//die("wjbcpa iuvb");
		$statement1 = $dbcon->prepare("INSERT INTO time (pid,roll_no,timestamp,filename,mem_used,exec_time) VALUES(:pid,:roll_no,:timestamp,:filename,:mem_used,:exec_time)");
		$statement1->execute(array('pid'=>$_SESSION['problemid'],'roll_no'=>$_SESSION['roll_no'],'timestamp'=>$time,'filename'=>$_SESSION['roll_no'].".txt",'mem_used'=>$mem_used,'exec_time'=>$exec_time));
	}
	else{
	$statement1 = $dbcon->prepare("UPDATE time SET timestamp='".$time."',mem_used=".$mem_used.",exec_time=".$exec_time." WHERE pid='".$_SESSION['problemid']."' AND roll_no='".$_SESSION['roll_no']."' AND filename='".$_SESSION['roll_no'].".txt'");
	$statement1->execute();
	}
	header('location: result.php?error=ok');
	//Display result of execution in result.php
}
}
?>