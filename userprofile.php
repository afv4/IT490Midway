<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : 'theForum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skeleton by our dark lord DJ Kehoe... the scraps by Wizard's Apprentices">
    <link rel="icon" href="favicon.ico">

    <title>User Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
    <h1 id="uname" class="hidden">
        <?php
          // temporarily enable superglobals
          $request->enable_super_globals();

          session_start();
          $_SESSION['UName'] = $_SESSION['username'];
          $_SESSION['PWord'] = $_SESSION['password'];

          // disable superglobals again
          $request->disable_super_globals();

          echo $_SESSION['username'];
        ?>
    </h1>
    <h1> User Profile </h1>
  <body>
    <form class="form-signin">
        <h3 id="realName"> Your Name: </h3>
        <h3 id="yourEmail"> Your E-Mail: </h3>
        <h3 id="userDoB"> Your DoB: </h3>
        <h3 id="aboutUser"> About You: </h3>

        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./cardlist.php'">Card Search</button>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./decklist.php'">Your Deck</button><br>
        <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='./theForum/autologin.php'">THE FORUM</button>
    </form>

    <script type="text/javascript">
    
    </script>
  </body>

</html>
