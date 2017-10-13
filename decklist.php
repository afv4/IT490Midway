<?php
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


      <h1 id="pageTitle">Your Decks!</h1>

    <body onload = "pullUserInfo()">
      <form class="form-signin">
          <ul id="deckNames">
            <li>Deck name here!</li><button id="editDeck">Edit</button><button id="deleteDeck">Delete</button>
          </ul>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Profile</button>
      </form>

      <script type="text/javascript">

        //function pullUserInfo(){}

      </script>
    </body>
</html>
