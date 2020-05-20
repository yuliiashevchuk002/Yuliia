<?php
 if(isset($_POST['submit'])){
 	$name = $_POST['name'];
 	$compname = $_POST['companyname'];
 	$subject = $_POST['subject'];
 	$mailFrom = $_POST['mail'];
 	$message = $_POST['message'];
$mailTo = 'sshevchukyulia@gmail.com';
$headers = "From: ".$mailFrom;
$txt = "Yuo have received an e-mail from" .$name.".\n\n".$message;


mail($mailTo,$subject, $txt, $headers);
header("Location:contact.php?mailsend");


 } 
?>