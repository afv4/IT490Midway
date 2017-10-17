<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('logscript.php');

function searchCards($type,$val)
{
  $file = __FILE__.PHP_EOL;
	$PathArray = explode("/",$file);
  $client = new rabbitMQClient("queryRabbitMQ.ini","testServer");
  $request = array();
  $request['type'] = $type;
  $request['val'] = $val;
  $response = $client->send_request($request);

  //echo "client received response: " . PHP_EOL
  LogMsg("Front-End has received card list: ".$response, $PathArray[4]);
  print_r($response);
  //echo "\n\n";
  return $response;
}

function getCard($type,$tag,$name)
{
  //$file = __FILE__.PHP_EOL;
  //$PathArray = explode("/",$file);
  $client = new rabbitMQClient("APIRabbit.ini","APIServer");
  $request = array();
  $request['type'] = $type;
  $request['tag'] = $tag;
  $request['name'] = $name;
  //$request['message'] = $msg;
  $response = $client->send_request($request);

  //$card = json_decode($response,true);
  //LogMsg("client received response: ",$PathArray[4]);
  //echo "client received response: ".PHP_EOL;
  print_r($response);
  //echo "\n\n";
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
  /*switch($request['type'])
  {
    case "searchAll":
      $result = searchCards($request["type"],$request["val"]);
    case "get_card":
      $card = getCard($request["type"],$request["tag"],$request["name"]);
    break;
  }*/
}

?>
