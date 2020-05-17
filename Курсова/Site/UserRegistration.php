
<?php
include('dbConection.php');
if(isset($_REQUEST['rSignup'])){
	//checking for empty field
	if(($_REQUEST['rName']== "") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']=="")){
	$regmsg = '<div class="alter-1" role ="alter">All fields are reqired</div>';
} else{
	//email already registered
$sql = "SELECT r_email FROM regustration_form WHERE r_email ='".$_REQUEST['rEmail']."'";
$result = $conn->query($sql);
if($result->num_rows==1){
	$regmsg = '<div class="alter-1" role ="alter">Email id already registered</div>';
} else{
	//assigning users 
$rName = $_REQUEST['rName'];
$rEmail = $_REQUEST['rEmail'];
$rPassword = $_REQUEST['rPassword'];
$sql = "INSERT INTO regustration_form(r_name, r_email, r_password) VALUES('$rName','$rEmail','$rPassword')";
if($conn->query($sql)==TRUE){
	$regmsg = '<div class="alter" role ="alter">Account successfuly created</div>';
}else{
	$regmsg = '<div class="alter-1" role ="alter">Unable to create account</div>' ;
}
}
}
}
?>

<div class="contsiner" id="registration">
	<h2>Create an Account</h2>
	<div class="row mt-4 mb-4">
		<div class="col-md-6 offset-md-3">
			<form action="" class="shadow-lg p-4" method ="POST">
				<div class="form-group">
					<i class="fa fa-user"></i> <label for="name" class="font-weight"></label>
					<input type="text" class="form-contol" placeholder="Name" name="rName">
				</div>
				<div class="form-group">
					<i class="fa fa-user"></i><label for="email" class="font-weight"></label>
					<input type="email" class="form-contol" placeholder="Email" name="rEmail">
				</div>
				<div class="form-group">
					<i class="fa fa-key"></i><label for="pass" class="font-weight"></label>
					<input type="password" class="form-contol" placeholder="Password" name="rPassword">
				</div>
				<button type="submit" class="btn_submit" name="rSignup">Sign up</button>
				 <?php if(isset($regmsg)){ echo $regmsg;}?>
			</form>
		</div>
	</div>
</div>


