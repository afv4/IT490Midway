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

    <h1 id="pageTitle">Your Deck!</h1>

    <body>
      <form class="form-signin" action="" method="post">
          <h3 id="avg">Average Deck Value: $<?php echo $_SESSION['deck']->get_price('avg');?></h3>
          <h2 id="deckList"><?php echo $_SESSION['deck']->show_cards();?></h2>

          <input type="text" id="card" name="cardName" class="form-control" placeholder="Exact name of the card you want removed!" autofocus>
          <button type"button" onclick="">Remove Card from Deck</button>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Profile</button>
      </form>

      <script type="text/javascript">

      function load_deck(){
        var request = new XMLHttpRequest();
        request.open("POST","AddToDeck.php",true);
        request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        request.onreadystatechange= function (){
          if ((this.readyState == 4)&&(this.status == 200)){
            HandleLoadResponse(this.responseText);
          }
        }
        request.send("type=load_deck&uid="+uid);
      }

      function HandleLoadResponse(response){
        //console.log(response);
        SuperCard = JSON.parse(response);
        console.log(SuperCard);
        var card = JSON.parse(response);
        //var cardThing = JSON.stringify(response);
        //console.log(cardThing);

        //var d = new Date();
        //d.setTime(d.getTime() + (0.042*24*60*60*1000));
        //var expires = "expires="+ d.toUTCString();
        document.cookie="cardData=" + response;// + expires + "path=/";

        document.getElementById("cardInfo").innerHTML = "<img src=\"http://" +
          card.image_url+ "\" alt='yugioh card image' height=400px width=275px><br><p>" +
          "Card Name: " +card.name+"<br>"+
          "Card Print Tag: " +card.tag+"<br>"+
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
          "Card Level: " +card.level + "</p><br>" +

          "<button type=\"button\" onclick=\"addToDeck()\">Add this card to your deck!</button>";
      }
      </script>
    </body>
</html>
