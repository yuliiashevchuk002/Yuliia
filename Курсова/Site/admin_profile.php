
 <html>
<head>
	<title>T&Q</title>
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet"  href="style2.css">
	<link rel="stylesheet"  href="stylepr.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-hwg4gsxgfzhoseeamdoygbf13fyquitwlaqgxvsngt4=" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.5.0.js"></script>
   <script src="jquery.fullpage"></script>

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
	<li><a href="log.php"><i class="fa fa-sign-out"></i>Log out</a></li>
	<li><a href="admin.php"><i class="fa fa-user-circle"></i>Admin</a></li>
	</ul>
</div>
<?php if(isset($regmsg)){echo $regmsg;}?>
		</form>
	</div>
	
</div>
</div>
<?php
session_start();
 include'dbConection.php';
 echo $_SESSION['aEmail'];
 ?>
 <div class="txt-heading">Orders</div>
    <style type="text/css">
      table {
        border-collapse: collapse;
        width: 98%;
        color:#fff;
        font-family: monospace;
        font-size: 15px;
        text-align: center;
        margin-left: 1%;
        margin-top: 3%;
      }

      th {
        background-color: rgba(0,0,0,0.6);
        color: white;
      }

      tr:nth-child(even) {background-color: rgba(0,0,0,0.3)}
    </style>
  </head>
  <body>
   
      <?php
      $sql = "SELECT * FROM tovaru";
      $result = $conn-> query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
        	?>
        	 <table>
      <tr>
        <th>ID order</th>
        <th>Code servise</th>
        <th>Name servise</th>
        <th>Price</th>
        <th>User</th>
      </tr>
        	<?php
          echo "<tr><td>" . $row["id"] . "</td><td>" . $row["code"] . "</td><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["user"] . "</td></tr>";
        }
      }
      else { ?><div class="no-records"><h>Not found orders<h/></div><?php
      }
      $conn-> close();
      ?>
    </table>
    <?php if(isset($regmsg)){ echo $regmsg;}?>
  </body>
</html>