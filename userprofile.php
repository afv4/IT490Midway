<?php
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
        <h2 id="rname">Real name!</h2>
        <h2 id="DOB">Date of birth!</h2>
        <h2>About Me!</h2>
          <p id="about">Like seriously... what?</p>
        <h2 id="UID">User ID number!</h2>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Decks</button>
    </form>

    <script type="text/javascript">

      //function pullUserInfo(){}

    </script>
  </body>

</html>
