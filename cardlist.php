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

    <title>Card List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>


      <h1 id="pageTitle">Card Search!</h1>

    <body onload = "pullUserInfo()">
      <form class="form-signin">

          <label for="searchCards" class="sr-only">Search fragment of card name here!</label>
          <input type="text" id="searchCards" class="form-control" placeholder="Search partial card name" autofocus>
          <button type"button" onclick="searchCards()">Search!</button>
          <h2>Search Results</h2>
          <ul id="searchResults">
            <li>Card name followed by card tag!</li>
          </ul>

          <label for="pullOneCard" class="sr-only">Search fragment of card name here!</label>
          <input type="text" id="pullOneCard" class="form-control" placeholder="Display Info on One Card">
          <button type"button" onclick="pullCard()">Show Card Info</button>
          <h2 id="cardName">Name:</h2>
          <h2 id="cid">Card ID:</h2>
          <h2 id="cardType">Card Type:</h2>
          <h2 id="cardDesc">Description:</h2>
          <h2 id="minPrice">Minimum Price:</h2>
          <h2 id="avgPrice">Average Price:</h2>
          <h2 id="maxPrice">Maximum Price:</h2>

          <select id="userDecks">
            <option value="NULL">Select a deck!</option>
            <option value="deckOne">Deck #1</option>
          </select>
          <button type"button" onclick="addToDeck()">Add this card to above deck!</button>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Profile</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Decks</button>

      </form>

      <script type="text/javascript">

        function searchCard(){

        }

        function pullCard(){

        }

      </script>
    </body>
</html>
