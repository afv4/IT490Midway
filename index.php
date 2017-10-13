<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skeleton by our lord and saviour DJ Kehoe... the scraps by Ayrton Ventura">
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

    <!---  <img weight="150" height="150"
            onmouseover="this.src='./praisethesun.gif'; this.width='150'; this.height='200';"
            onmouseout="this.src='./praisethesun.jpg'; this.width='150'; this.height='150';"
            src="./praisethesun.jpg" />
    --->

      <form id="loginForm" class="form-signin">
        <h2 class="form-signin-heading">Authenticate Yourself</h2>
        <input type="hidden" name="mysession" id="mysession">
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
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href='./registerNow.html'">Register Now</button>
      </form>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  	<script type="text/javascript">
    function submitLogin()
    {
      var uname = document.getElementById("inputName").value;
      var pword = document.getElementById("inputPassword").value;
      sendLoginRequest(uname,pword);
      return 0;
    }

    function HandleLoginResponse(response)
    {
      var text = JSON.parse(response);
      document.getElementById("output").innerHTML = text;
      if(text == "Heading online now!<p><img src='./praisethesun.gif'/>"){
        alert("Login Success!");
        //$_SESSION['username'] = document.getElementById("inputName").value;
        document.location.href="userprofile.php";
      }else if(text == "Incorrect Username or Password<p>"){
        alert("Incorrect username or password!");
      }
    }

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

    /*function HandleLoginResponse(response){
      var data = JSON.parse(response)
      var text = JSON.stringify(response)
      if(data.status != response){
        alert("Login Failed!");
        location.reload();
      }
      else{
        sessionStorage.setItem("sessionId",data.sessionId);
        sessionStorage.setItem("username",data.username);
        sessionStorage.setItem("role",data.role);
        document.location.href="userprofile.html"
      }
    }*/

    </script>
  </body>
</html>
