<?php
require_once('deck_class.php');

session_start();
$uname = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skeleton by our dark lord DJ Kehoe... the scraps by Wizard's Apprentices">
    <link rel="icon" href="favicon.ico">

    <title>Card List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

      <h1 id="uname" class="hidden">
        <?php echo $_SESSION['username'];?>
      </h1>
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
          <div id="answer"></div>

          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Profile</button>
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Deck</button>

      </form>

      <script type="text/javascript">
        var SuperCard = '';
        /* This function pulls the text that was entered in the "searchCards"
           text box and sends that data over to the function below it for
           processing and send it to the server for data pull. */
        function pullSearchValue()
        {
          var val = document.getElementById("searchCards").value;
          searchCards(val);
          return 0;
        }

        /* This function recieves the text that was sent from the above
           function. Then, this function sends that data over to the server via
           the search.php file. The returned data is then sent to the function
           below to place the data onto the screen. */
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

        /* This function pulls the text that was entered in the "cardSet"
           text box and the "cardName" text box and sends that data over to the
           function below it for processing and send it to the server for data
           pull. */
        function pullCardInfo(){
          var cardID = document.getElementById("cardSet").value;
          var cName = document.getElementById("cardName").value;
          getCardInfo(cardID,cName);
          return 0;
        }

        /* This function recieves the text that was sent from the above
           function. Then, this function sends that data over to the server via
           the search.php file. The returned data is then sent to the function
           below to place the data onto the screen. */
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

        function getCardCookie() {
            var name = "cardData=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');

            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];

                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }

                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }


        function addToDeck(){
          var uname = document.getElementById('uname').innerHTML;
          uname = uname.replace(/\s+/g, '');
          console.log(uname);
          console.log(SuperCard);
          //var card = getCardCookie();
          SuperCard = JSON.stringify(SuperCard)
          //console.log(card);
          //card = JSON.parse(card);
          //console.log(card);
          //card = JSON.stringify(card);
          var request = new XMLHttpRequest();
          request.open("POST","AddToDeck.php",true);
          request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          request.onreadystatechange= function (){
            if ((this.readyState == 4)&&(this.status == 200)){
              HandleAddResponse(this.responseText);
            }
          }
          //request.send("type=add_card&uid="+uname+"&card="+card);
          request.send("type=add_card&uid="+uname+"&card="+SuperCard);
        }


        function HandleAddResponse(response){
          document.getElementById("answer").innerHTML = "<p> CARD ADDED!! </p>";
        }

      </script>
    </body>
</html>
