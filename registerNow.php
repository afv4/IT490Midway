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
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Skeleton by our lord and saviour DJ Kehoe... the scraps by Ayrton Ventura">
		<link rel="icon" href="favicon.ico">

		<title>Registration Page</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="signin.css" rel="stylesheet">
	</head>

	<h1 id="uname">
		<?php
	  	// temporarily enable superglobals
	    $request->enable_super_globals();

      session_start();
      $_SESSION['UserName'] = 'spanish123';
      $_SESSION['PassWord'] = 'password';
      $_SESSION['email'] = 'spanish123@gmail.com';

      // disable superglobals again
      $request->disable_super_globals();
	  ?>
	</h1>
	<span id='b4'> <a href='theForum/register.php'>bb register</a></span>

	<body>
    <div id = "output">
	Registration Page!<p>
    </div>
    <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading">Make a new account below!</h2>
        <label for="inputName" class="sr-only">Username</label>
        <input type="username" id="inputName" class="form-control" placeholder="Requested Username (REMEMBER!!)" required autofocus>
        <label for="inputPassword" class="sr-only"> Requested Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder=" Requested Password (REMEMBER!!)" required>
				<label for="email" class="sr-only">Your EMAIL</label>
        <input type="input" id="email" class="form-control" placeholder="part@email.what" required>
				<label for="dob" class="sr-only">Date of Birth</label>
        <input type="input" id="dob" class="form-control" placeholder="yyyy-mm-dd" required>
				<label for="aboutMe" class="sr-only">About Me</label>
        <input type="input" id="aboutMe" class="form-control" placeholder="About Me" required>
				<label for="rName" class="sr-only">Real Name</label>
        <input type="input" id="rName" class="form-control" placeholder="Real Name" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="submitRegistration()">Create Account Now!</button>
      </form>
    </div>

				<script src="js/ie10-viewport-bug-workaround.js"></script>
			<script>
		function submitRegistration(){
			var uname = document.getElementById("inputName").value;
			var pword = document.getElementById("inputPassword").value;
			var dob = document.getElementById("dob").value;
			var aboutMe = document.getElementById("aboutMe").value;
			var rName = document.getElementById("rName").value;
			var email = document.getElementById("email").value;
			sendRegistrationRequest(uname,pword,dob,aboutMe,rName,email);
			return 0;
		}
		function HandleRegistrationResponse(response){
			var text = JSON.parse(response);
      document.getElementById("output").innerHTML = text;
      if(text == "Heading online now!<p><img src='./praisethesun.gif'/>"){
        alert("Registration Success!");
        document.location.href="index.php";
      }else if(text == "Incorrect Username or Password<p>"){
        alert("Username already in use!");
      }
		}
		function sendRegistrationRequest(username,password,dob,aboutMe,rName,email){
			var request = new XMLHttpRequest();
			request.open("POST","login.php",true);
			request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			request.onreadystatechange= function (){
				if ((this.readyState == 4)&&(this.status == 200)){
					HandleRegistrationResponse(this.responseText);
				}
			}
			request.send("type=register&uname="+username+"&pword="+password+"&dob="+dob+"&aboutMe="+aboutMe+"&rName="+rName+"&email="+email);
		}

		</script>

	</body>
</html>
