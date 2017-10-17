<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('logscript.php');
//include_once('testRabbitMQClient.php')

session_start();

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
  $request = array();
  $request['type'] = $type;
  $request['username'] = $username;
  $request['password'] = $password;
  //$request['message'] = $msg;
  $response = $client->send_request($request);
  //$response = $client->publish($request);

	LogMsg("Front-End has received response for login: ".$response, $PathArray[4]);
  return $response;
}

function registertoServer($type,$username,$password,$dob,$aboutMe,$rName)
{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['username'] = $username;
  $request['password'] = $password;
	$request['dob'] = $dob;
	$request['aboutMe'] = $aboutMe;
	$request['rName'] = $rName;
  //$request['message'] = $msg;
  $response = $client->send_request($request);
  //$response = $client->publish($request);

  //LogMsg("Front-End has received response for registration: ".$response, $PathArray[4]);
  return $response;
}

switch ($request["type"])
{
	case "login":
		//$response = "login, yeah we can do that";
		$response = sendtoServer($request['type'],$request['uname'],$request['pword']);
	case "register":
		//$response = "register, yeah we can do that";
		$response = registertoServer($request["type"],$request['uname'],$request['pword'],$request['dob'],$request['aboutMe'],$request['rName']);;

	break;
}

$_SESSION['username'] = $request['uname'];

if($response){
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
	LogMsg("Front-End Login Successful! ".$response, $PathArray[4]);
	echo json_encode("Heading online now!<p><img src='./praisethesun.gif'/>");
}
else{
	$file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
	LogMsg("Front-End Login Failed! ".$response, $PathArray[4]);
	echo json_encode("Incorrect Username or Password<p>");
}

//echo json_encode($response);
exit(0);

?>
