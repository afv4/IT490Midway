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

    <body>
      <form class="form-signin">

          <label for="searchCards" class="sr-only">Search fragment of card name here!</label>
          <input type="text" id="searchCards" class="form-control" placeholder="Search partial card name" autofocus>
          <button type="button" onclick="pullSearchValue()">Search!</button>
          <h2>Search Results</h2>
          <div id="results"></div>

          <label for="pullOneCard" class="sr-only">Search fragment of card name here!</label>
          <input type="text" id="cardSet" class="form-control" placeholder="Copy card ID from above (AAA-AA123)">
          <input type="text" id="cardName" class="form-control" placeholder="Copy card name here from above">
          <button type="button" onclick="pullCardInfo()">Show Card Info</button>
          <div id="cardInfo"></div>
          
          <button type"button" >Add this card to your deck!</button>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Profile</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Decks</button>

      </form>

      <script type="text/javascript">

        function pullSearchValue()
        {
          var val = document.getElementById("searchCards").value;
          searchCards(val);
          return 0;
        }

        function searchCards(value){
          var request = new XMLHttpRequest();
          request.open("POST","search.php",true);
          request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          request.onreadystatechange= function (){
            if ((this.readyState == 4)&&(this.status == 200)){
              HandleSearchResponse(this.responseText);
            }
          }
          request.send("type=searchAll&val="+value);
        }

        function HandleSearchResponse(response){
          //console.log(response);
          var array = JSON.parse(response);
          document.getElementById("results").innerHTML = "<p>" + array + "</p>";
        }



        function pullCardInfo(){
          var cardID = document.getElementById("cardSet").value;
          var cName = document.getElementById("cardName").value;
          getCardInfo(cardID,cName);
          return 0;
        }

        function getCardInfo(cID,cNam){
          var request = new XMLHttpRequest();
          request.open("POST","search.php",true);
          request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          request.onreadystatechange= function (){
            if ((this.readyState == 4)&&(this.status == 200)){
              HandleCardPullResponse(this.responseText);
            }
          }
          request.send("type=get_card&tag="+cID+"&name="+cNam);
        }

        function HandleCardPullResponse(response){
          //console.log(response);
          var card = JSON.parse(response);
          document.getElementById("cardInfo").innerHTML = "<p>" +
            "Card Name: " +card.name+"<br>"+
            "Card Rarity: " +card.rarity+"<br>"+
            "Card High Price: $" +card.high_price+"<br>"+
            "Card Low Price: $" +card.low_price+"<br>"+
            "Card Avg Price: $" +card.avg_price+"<br>"+
            "Card Desc: " +card.text+"<br>"+
            "Card Type: " +card.card_type+"<br>"+
            "Monster Type: " +card.type+"<br>"+
            "Card Element: " +card.family+"<br>"+
            "Card ATK: " +card.atk+"<br>"+
            "Card DEF: " +card.def+"<br>"+
            "Card Level: " +card.level + "</p>";
        }

      </script>
    </body>
</html>
