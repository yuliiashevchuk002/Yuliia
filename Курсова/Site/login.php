<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet"  href="style2.css">
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
<div class="contsine">

	<h2>Audit for you</h2>
	<p class="text-center"><i class ="fa fa-user-secret"></i>Requester area</p>
	<div class="container-fluid"></div>

<div class="row">
	<div class="col-md">
		<form action=""class="shadow-lg p-4" method="POST">
			<div class="form-group">

			<i class="fa fa-user"></i><label  for="email" class="front-weight"></label><input type="email" class="form-control" placeholder="Email" name="rEmail">
			</div>
<div class="form-group">
	<i class="fa fa-key"></i><label  for="pass" class="front-weight"></label><input type="password" class="form-control" placeholder="Password" name="rPassword">
</div>

<button type="submit" class="btn_submit">Login</button>
		</form>

	</div>
	
</div>
</div>
<?php 
include('dbConection.php');
session_start();
if(!isset($_SESSION['is_login'])){
if(isset($_REQUEST['rEmail'])){
$rEmail= mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
$rPassword=  mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));
$sql= "SELECT r_email, r_password FROM regustration_form WHERE r_email = '".$rEmail."' AND r_password = 
'".$rPassword."' limit 1";
$result = $conn->query($sql);
if($result->num_rows==1){
	$_SESSION['is_login']=true;
	$_SESSION['rEmail'] = $rEmail;
echo "<script> location.href='UserProfail.php';</script>";

 }else{?>
 	<div class="alter-1">Enter valid email and password</div>;
 	<?php
 }

   }
}else{
	echo "<script> location.href='UserProfail.php';</script>";
}

 ?>


</body>
</html>