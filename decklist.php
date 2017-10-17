<?php
require_once('logscript.php');

session_start();
$uname = $_SESSION['username'];
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


      <h1 id="pageTitle">Your Deck!</h1>

    <body>
      <form class="form-signin">

          <div id="deckList"></div>

          <input type="text" id="cardID" name="cardTag" class="form-control" placeholder="Card tag of the card you want removed!" autofocus>
          <h3 id="high">High Deck Value:</h3>
          <h3 id="low">Low Deck Value:</h3>
          <h3 id="avg">Average Deck Value:</h3>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Mailbox</button>
      </form>

      <script type="text/javascript">

        //function loadDeck(){}
        //function removeFromDeck(){}
        //function getHigh(){}
        //function getLow(){}
        //function getAvg(){}

      </script>
    </body>
</html>
