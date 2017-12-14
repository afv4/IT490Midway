<?php
require_once('logscript.php');
require_once('AddToDeck.php');

session_start();
$uname = $_SESSION['username'];
//$_SESSION['deck'] = new Deck($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skeleton by our lord and saviour DJ Kehoe... the scraps by Wizard's Apprentices">
    <link rel="icon" href="favicon.ico">

    <title>Deck List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
    <div id="uname">
      <?php echo $_SESSION['username'];?>
    </div>
    <h1 id="pageTitle">Your Deck!</h1>

    <body>
      <form class="form-signin" action="" method="post">
          <h3 id="avg"></h3>
          <h2 id="deckList"></h2>

          <input type="text" id="card" name="cardName" class="form-control" placeholder="Exact name of the card you want removed!" autofocus>
          <button type="button" onclick="">Remove Card from Deck</button><br><br>

          <button type="button" onclick="load_deck_one()">Show Deck #1</button>
          <button type="button" onclick="">Show Deck #2</button>
          <button type="button" onclick="">Show Deck #3</button><br><br>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Profile</button>
      </form>

      <script type="text/javascript">

      function load_deck_one(){
        var uid = document.getElementById('uname').innerHTML;
        var request = new XMLHttpRequest();
        request.open("POST","AddToDeck.php",true);
        request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        request.onreadystatechange= function (){
          if ((this.readyState == 4)&&(this.status == 200)){
            HandleLoadOneResponse(this.responseText);
          }
        }
        request.send("type=load_deck&uid="+uid);
      }

      function HandleLoadOneResponse(response){
        console.log(response);
      }

      </script>
    </body>
</html>
