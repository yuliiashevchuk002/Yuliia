<html>
<head>
	<title>Contact</title>
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet"  href="contact.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-hwg4gsxgfzhoseeamdoygbf13fyquitwlaqgxvsngt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="main.js"> </script>
</head>
<body>

	<div class = "menu-bar">
		
		<div class="logo">
			
		<img src="logo.png" width="10" height="10"> 
		<div class="text">
<br><font face="Arial" size="0.8"  color="White">Trust and Quality</font>

	</div>
</div>

	<ul>

	<li class="active"><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
	<li><a href="About.html"><i class="fa fa-users"></i>About us</a>
<div class="sub-menu-1">
	<ul>
		<li><a href="About.html#postHistory">History</a></li>
		<li><a href="About.html#postValue">Value</a></li>
		<li><a href="About.html#postTeam">Team</a></li>
	</ul>

</div>
	</li>

	<li><a href="contact.php"><i class="fa fa-handshake-o"></i>Contact</a></li>
	<li><a href="signup.php"><i class="fa fa-sign-in"></i>Sing up</a></li>
	<li><a href="login.php"><i class="fa fa-key"></i>Log in</a></li>
	</ul>
</div>
<div class="text-c">
	<p>Send e-mail</p>
	</div>
	<form class = "contact" action="contact.php" method="post">
		<input type="text" name="name" placeholder="Full name"><br>
		<br>
		<input type="text" name="mail" placeholder="Your email"><br>
		<br>
		<input type="text" name="companyname" placeholder="Company name"><br>
		<br>
		<input type="text" name="subject" placeholder="Subject"><br>
		<br>
		<input  type="text" name="message" placeholder="Message"></input><br>
		<br>
		<button type="submit" name = "submit" style="margin: center;margin-left: 163px;"> Sent email</button>
		<?php
include('contactform.php');
		?>
	</form>

</body>
</html>