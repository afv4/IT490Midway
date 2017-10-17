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
    <h1 id="uname"><?php echo $_SESSION['username']; ?></h1>

  <body onload = "pullUserInfo()">
    <form class="form-signin">

        <input type="text" id="receiver" name="sendTo" class="form-control" placeholder="Who are you sending this to?" autofocus>
        <input type="text" id="messageBlock" name="messageArea" class="form-control" placeholder="Write your message!" autofocus>
        <button onclick="">SEND Message</button>

        <h2>***Inbox***</h2>
        <button onclick="">Update Inbox</button><br>

        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Deck</button>
    </form>

    <script type="text/javascript">

    function pushMessage()
    {
      var receiver = document.getElementById("searchCards").value;
      var message = document.getElementById("messageBlock").value;
      var sender = "<?php echo $_SESSION['username']; ?>";
      pushing(receiver,message,sender);
      return 0;
    }

    function pushing(receiver,message,sender){
      var request = new XMLHttpRequest();
      request.open("POST","forum.php",true);
      request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      request.onreadystatechange= function (){
        if ((this.readyState == 4)&&(this.status == 200)){
          HandleSearchResponse(this.responseText);
        }
      }
      request.send("type=sendMessage&uid="+receiver+"&message="+message);
    }

    function HandlePushingResponse(response){
      //console.log(response);
      //var array = JSON.parse(response);
      //document.getElementById("results").innerHTML = "<p>" + array + "</p>";
    }

    function pullMessage()
    {
      var uname = "<?php echo $_SESSION['username']; ?>";
      pulling(uname);
      return 0;
    }

    function pulling(value){
      var request = new XMLHttpRequest();
      request.open("POST","forum.php",true);
      request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      request.onreadystatechange= function (){
        if ((this.readyState == 4)&&(this.status == 200)){
          HandleSearchResponse(this.responseText);
        }
      }
      request.send("type=getMessage&val="+value);
    }

    function HandleSearchResponse(response){
      //console.log(response);
      var array = JSON.parse(response);
      document.getElementById("results").innerHTML = "<p>" + array + "</p>";
    }

    </script>
  </body>

</html>
