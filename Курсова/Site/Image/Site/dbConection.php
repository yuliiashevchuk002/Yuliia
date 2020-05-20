<?php
$db_host ="localhost";
$db_user = "root";
$db_password = "";
$db_name = "t&q_base";
$conn =  new mysqli($db_host, $db_user, $db_password, $db_name);
//if($conn->connect_error){
	//die('Connection failed');
//}
//$db = new PDO("mysql:host=$db_host; dbname=$db_user",$db_password,$db_name);
//$i = $db->query("SELECT id FROM subcategory where title ='$title' ")->fetch();
//var_dump($i);
//	echo "Connect";
//}
//?>