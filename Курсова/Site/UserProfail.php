<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet"  href="stylepr.css">

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
	<li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
	
	<li><a href="UserProfail.php"><i class="fa fa-user"></i>Profile</a></li>
	</ul>
</div>
<?php
session_start();
require_once("dbcontroller.php");
 include'dbConection.php';
 echo $_SESSION['rEmail']; 
$db_handle = new DBController();
 if(isset($_REQUEST['submit']))
         {
          $user= $_POST['user'];
            $name= $_POST['name'];
            $price= $_POST['price'];
            $code= $_POST['code'];
           
$sql = "INSERT INTO tovaru ( code, name, price, user) VALUES ( '$code', '$name', '$price', '$user' )";
if($conn->query($sql)==TRUE){
}else{ echo 'Order was made successfuly';
}
       }
        else{   
        	//echo 'query doesnt execute';
         }
     

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM prod_serv WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'period'=>$productByCode[0]["period"], 'quantity'=>$_POST["quantity"],'user'=>$_SESSION['rEmail'] ,'price'=>$productByCode[0]["price"],'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}


		}

	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="UserProfail.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;color: #FFFFE0;">Name</th>
<th style="text-align:left;color: #FFFFE0;">User</th>
<th style="text-align:left;color: #FFFFE0;">Code</th>
<th style="text-align:left;color: #FFFFE0;">Period</th>
<th style="text-align:right;color: #FFFFE0;" width="5%">Quantity</th>
<th style="text-align:right;color: #FFFFE0;" width="10%">Unit Price</th>
<th style="text-align:right;color: #FFFFE0;" width="10%">Price</th>
<th style="text-align:center;color: #FFFFE0;" width="5%">Remove</th>
</tr>	
<form  method="post" action="UserProfail.php">
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td style="color: #FFFFE0;"><?php  echo  $item["name"]; ?>
                        <input type="hidden" name="name" value="<?php echo $item['name'];?>"></td>
				<td style="color: #FFFFE0;"><?php echo $_SESSION['rEmail']; ?>
                        <input type="hidden" name="user" value="<?php echo $item['user'];?>"></td>
				<td style="color: #FFFFE0;"><?php echo $item["code"]; ?><input type="hidden" name="code" value="<?php echo $item['code'];?>"></td>
				<td style="color: #FFFFE0;"><?php echo $item["period"]; ?></td>
				<td style="text-align:right;color: #FFFFE0;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;color: #FFFFE0;"><?php echo "$ ".$item["price"]; ?>
                        <input type="hidden" name="price" value="<?php echo $item['price'];?>"></td>
				<td  style="text-align:right;color: #FFFFE0;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;color: #FFFFE0;"><a href="UserProfail.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);

				
		}
		
		?>
 
<td colspan="2" align="right" style="color: #FFFFE0;">Total:</td>
<td align="right" style="color: #FFFFE0;"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2" style="color: #FFFFE0;"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<tr>
   <br> <td style="margin-right: -100px;" ><input type="submit" name="submit" value="submit" class="but" /></td>
 </tr>	
</form>
  <?php
} else {
?>
<div class="no-records"><h>Your Cart is Empty<h/></div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Services</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM prod_serv ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="UserProfail.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-title"><?php echo $product_array[$key]["period"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
			
		</div>
	<?php
		}
	}
	?>
</div>

<!--<divclass="logout">-->
<!--<li class="nav-item"><a class="link" href="logout.php">Logout</a></li>-->
</div>
</body>
</html>