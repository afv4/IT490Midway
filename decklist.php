<?php
require_once('logscript.php');
require_once('deck_class.php');

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
          <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./userprofile.php'">Your Mailbox</button>
      </form>

      <script type="text/javascript">

      </script>
    </body>
</html>
