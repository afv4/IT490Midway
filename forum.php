<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function getAllUsers($type)
{
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $response = $client->send_request($request);

  //echo "client received response" . PHP_EOL;
  print_r($response);
  //echo "\n\n";
  return $response;
}

function getMessage($type,$userName)
{
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['userName'] = $userName;
  $response = $client->send_request($request);

  //echo "client received response: " . PHP_EOL;
  print_r($response);
  //echo "\n\n";
  return $response;
}

function sendMessage($type,$userName,$message)
{
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['userName'] = $userName;
  $request['message'] = $message;
  $response = $client->publish($request);
}

if(isset($_POST)){
  $request = $_POST;
    if ($request['type']=="getMessage"){
        $message = getMessage($request["type"],$request["userName"]);
    }
    else if ($request['type']=="sendMessage"){
        $message = sendMessage($request["type"],$request["userName"],$request["message"]);
    }
    else if ($request['type']=="getAllUsers"){
        $uid = getAllUsers($request['type']);
    }
}

//sendMessage("sendMessage","jill","I want to trade now");
//getMessage("getMessage","jill");
//getAllUsers("getAllUsers");
?>
