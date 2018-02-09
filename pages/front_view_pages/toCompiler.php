
<?php

	$soap_client = new SoapClient("http://ideone.com/api/1/service.wsdl");
	$user = "prtsh32@gmail.com";
	$pass = "f7d34384ee41420af555";
	$stdin = null;
	$languages = $soap_client->testFunction($user, $pass);
	/*$languages = $soap_client->createSubmission("prtsh32", "Astronomy", file_get_contents("C:/xampp/htdocs/CodeMaster/MOSS-PHP-master/d.java"), 10, $stdin, true, true);
	$substatus = $soap_client->getSubmissionStatus($user, $pass, $languages['link']);
	while($substatus['status'] < 0)
	{
		sleep(5);
		$substatus = $soap_client->getSubmissionStatus($user, $pass, $languages['link']);
	}
	if($substatus['status'] == 0)
	{
		switch($substatus['result'])
		{
			case 0: echo "Run is set to false";
			break;
			case 11: echo "Compilation Error";
			break;
			case 12: echo "Runtime Error";
			break;
			case 13: echo "Time Limit Exceeded";
			break;
			case 15: echo "SUCCESS!!!";
			break;
			case 17: echo "Memory Limit Exceeded";
			break;
			case 19: echo "Illegal System Call";
			break;
			case 20: echo "Internal Error. Try submitting again.";
			break;
		}
	}
	$subdetails = $soap_client->getSubmissionDetails($user, $pass, $languages['link'], false, true, true, true, true);
	*/
	echo '<pre>', print_r($languages), '</pre>';
?>