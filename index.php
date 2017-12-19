<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skeleton by our dark lord DJ Kehoe... the scraps by Ayrton Ventura">
    <link rel="icon" href="favicon.ico">

    <title>Welcome to DIE!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>


    <div id = "output"></div>
    <div class="container">

      <form id="loginForm" class="form-signin">
        <h2 class="form-signin-heading">Authenticate Yourself On the Primary!</h2>
        <label for="inputName" class="sr-only">Username</label>
        <input type="username" id="inputName" name="userInput" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember Login ID
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="submitLogin()">Sign in</button>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href='./registerNow.php'">Register Now</button>
      </form>

    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  	<script type="text/javascript">

    /* This function pulls the text that was entered in the "inputName"
       and "inputPassword" text boxes and sends that data over to the
       function "sendLoginRequest" for processing and send it
       to the authentication server for user verification. */
    function submitLogin()
    {
      var uname = document.getElementById("inputName").value;
      var pword = document.getElementById("inputPassword").value;
      sendLoginRequest(uname,pword);
      return 0;
    }

    /* This function recieves the data that was sent from the above
       function. Then, this function sends that data over to the
       authentication server via the login.php file. The returned
       response is then sent to the function HandleLoginResponse
       to either allow user access to the site or not. */
    function sendLoginRequest(username,password)
    {
      var request = new XMLHttpRequest();
      request.open("POST","login.php",true);
      request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      request.onreadystatechange= function (){
        if ((this.readyState == 4)&&(this.status == 200)){
          HandleLoginResponse(this.responseText);
        }
      }
      request.send("type=login&uname="+username+"&pword="+password);
    }

    /* This function gets the response from "sendLoginRequest" and
       appropriately displays whether or not the user was allowed
       entry into the site and send them in.*/
    function HandleLoginResponse(response)
    {
      console.log(response);
      var text = JSON.parse(response);
      document.getElementById("output").innerHTML = text;
      if(text == "Heading online now!<p><img src='./praisethesun.gif'/>"){
        alert("Login Success!");
        document.location.href="userprofile.php";
      }else if(text == "Incorrect Username or Password<p>"){
        alert("Incorrect username or password!");
      }
    }
    </script>
  </body>
</html>
