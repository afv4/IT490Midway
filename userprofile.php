<?php
require_once('logscript.php');

session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skeleton by our lord and saviour DJ Kehoe... the scraps by Wizard's Apprentices">
    <link rel="icon" href="favicon.ico">

    <title>User Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
    <h1 id="uname">
        <?php
          /*// temporarily enable superglobals
          $request->enable_super_globals();

          session_start();
          $_SESSION['UName'] = 'admin';
          $_SESSION['PWord'] = 'password';

          // disable superglobals again
          $request->disable_super_globals();*/

          echo $_SESSION['username'];
        ?>
    </h1>

  <body onload = "getAll()">
    <form class="form-signin">

        <input type="text" id="receiver" name="sendTo" class="form-control" placeholder="Who are you sending this to?" autofocus>
        <input type="text" id="messageBlock" name="messageArea" class="form-control" placeholder="Write your message!" autofocus>
        <button type="button" onclick="pushMessage()">SEND Message</button>

        <h2 id="userList"><h2>

        <h2>***Inbox***</h2>
        <button type="button" onclick="pullMessage()">Update Inbox</button><br>
        <div id="inbox"></div>

        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Deck</button><br>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./theForum/index.php'">THE FORUM</button>
    </form>

    <script type="text/javascript">

    function pushMessage()
    {
      var receiver = document.getElementById("receiver").value;
      var message = "Hi this is " + document.getElementById('uname').innerHTML + " --> " + document.getElementById("messageBlock").value;
      pushing(receiver,message);
      return 0;
    }

    function pushing(receiver,message){
      var request = new XMLHttpRequest();
      request.open("POST","forum.php",true);
      request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      request.send("type=sendMessage&userName="+receiver+"&message="+message);
    }

    function pullMessage()
    {
      var uname = document.getElementById('uname').innerHTML;
      pulling(uname);
      return 0;
    }

    function pulling(uname){
      var request = new XMLHttpRequest();
      request.open("POST","forum.php",true);
      request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      request.onreadystatechange= function (){
        if ((this.readyState == 4)&&(this.status == 200)){
          HandlePullingResponse(this.responseText);
        }
      }
      request.send("type=getMessage&userName="+uname);
    }

    function HandlePullingResponse(response){
      console.log(response);
      var messages = JSON.parse(response);
      document.getElementById("inbox").innerHTML = "<p>" + messages + "</p>";
    }

    function getAll(){
      var request = new XMLHttpRequest();
      request.open("POST","forum.php",true);
      request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      request.onreadystatechange= function (){
        if ((this.readyState == 4)&&(this.status == 200)){
          HandleUIDResponse(this.responseText);
        }
      }
      request.send("type=getAllUsers");
    }

    function HandleUIDResponse(response){
      //console.log(response);
      var array = JSON.parse(response);
      document.getElementById("userList").innerHTML = "List of all users: " + array;
    }

    </script>
  </body>

</html>
