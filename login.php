<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('logscript.php');
require_once('AddToDeck.php');

if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";

function sendtoServer($type,$username,$password)
{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	//$client = SendToConsumer("testRabbitMQ.ini", "testBackup.ini", "testServer");
  $request = array();
  $request['type'] = $type;
  $request['username'] = $username;
  $request['password'] = $password;
  $response = $client->send_request($request);

	LogMsg("Front-End has received response for login: ".$response, $PathArray[4], 'afv4', 'DevFront');
  return $response;
}

function registertoServer($type,$username,$password,$dob,$aboutMe,$rName)
{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	//$client = SendToConsumer("testRabbitMQ.ini", "testBackup.ini", "testServer");
  $request = array();
  $request['type'] = $type;
  $request['username'] = $username;
  $request['password'] = $password;
	$request['dob'] = $dob;
	$request['aboutMe'] = $aboutMe;
	$request['rName'] = $rName;
  $response = $client->send_request($request);

  LogMsg("Front-End has received response for registration: ".$response, $PathArray[4], 'afv4', 'DevFront');
  return $response;
}

switch ($request["type"])
{
	case "login":
		$response = sendtoServer($request['type'],$request['uname'],$request['pword']);
	case "register":
		$response = registertoServer($request["type"],$request['uname'],$request['pword'],$request['dob'],$request['aboutMe'],$request['rName']);

	break;
}

session_start();
$_SESSION['username'] = $request['uname'];
$_SESSION['password'] = $request['pword'];
$uname = $_SESSION['username'];
$_SESSION['deck'] = LoadDeck($uname);

if($response){
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
	LogMsg("Front-End Login Successful! ".$response, $PathArray[4], 'afv4', 'DevFront');
	echo json_encode("Heading online now!<p><img src='./praisethesun.gif'/>");
}
else{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
	LogMsg("Front-End Login Failed! ".$response, $PathArray[4], 'afv4', 'DevFront');
	echo json_encode("Incorrect Username or Password<p>");
}

exit(0);
?>
