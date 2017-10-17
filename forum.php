<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function getUid($type,$userName)
{
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['userName'] = $userName;
  $response = $client->send_request($request);

  //echo "client received response" . PHP_EOL;
  print_r($response);
  //echo "\n\n";
  return $response;
}

function getMessage($type,$uid)
{
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['uid'] = $uid;
  $response = $client->send_request($request);

  //echo "client received response: " . PHP_EOL;
  print_r($response);
  //echo "\n\n";
  return $response;
}

function sendMessage($type,$uid,$message)
{
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['uid'] = $uid;
  $request['message'] = $message;
  $response = $client->publish($request);
}

if(isset($_POST)){
  $request = $_POST;
  if ($request['type']=="getMessage"){
    $message = getMessage($request["type"],$request["uid"]);
  }
  else if ($request['type']=="sendMessage"){
    $message = sendMessage($request["type"],$request["uid"],$request["message"]);
  }
  else if ($request['type']=="getUid"){
    $uid = getUid($request['type'],$request['username'])
  }
}

//$uidT = getUid("getUid","jill");
#sendMessage("sendMessage",$uidT,"I want to trade now");
getMessage("getMessage",$uidT)
#getUid("getUid","jill");


?>
