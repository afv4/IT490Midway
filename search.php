<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('logscript.php');
require_once('CheckAlive.php');

function searchCards($type,$val)
{
  $file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  //$client = SendToConsumer("queryRabbitMQ.ini", "queryBackup.ini", "testServer");
  $request = array();
  $request['type'] = $type;
  $request['val'] = $val;
  $response = $client->send_request($request);

  LogMsg("Front-End has received card list: ".$response, $PathArray[4], 'afv4', 'ProdFront');
  print_r($response);
  return $response;
}

function getCard($type,$tag,$name)
{
  $file = __FILE__.PHP_EOL;
  $PathArray = explode("/",$file);
  $client = new rabbitMQClient("APIRabbit.ini","APIServer");
  //$client = SendToConsumer("APIRabbit.ini", "APIBackup.ini", "APIServer");
  $request = array();
  $request['type'] = $type;
  $request['tag'] = $tag;
  $request['name'] = $name;
  $response = $client->send_request($request);

  LogMsg("Front-End pulled card info: ",$response, $PathArray[4], 'afv4', 'ProdFront');
  print_r($response);
  return $response;
}

if(isset($_POST)){
  $request = $_POST;
  if ($request['type']=="searchAll"){
    $result = searchCards($request["type"],$request["val"]);
  }
  else if ($request['type']=="get_card"){
    $card = getCard($request["type"],$request["tag"],$request["name"]);
  }
}
?>
