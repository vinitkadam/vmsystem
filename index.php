<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>CISF Login</title>
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
</head>
<body>
<header class="w3-container w3-red w3-mobile">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<br>
<div class="w3-container">
<nav class="w3-topnav w3-right" > 
<a class='w3-btn w3-light-blue w3-round-xlarge' href="adminlogin.php">Admin Login</a>
<a class='w3-btn w3-light-blue w3-round-xlarge' href="emplogin.php">Employee Login</a>
</nav>
</div>
		<div class="w3-container w3-card-4 w3-round-large w3-border" style="max-width:500px;margin:0 auto;padding:10px;margin-top:15px">
			<h2 class="w3-center">CISF Login</h2>
			<form action="index.php" method="post">
		
			
				<label><b>Username</b></label>
				<input class="w3-input" "type="text" placeholder="Enter Username" name="username" style="margin-bottom:10px;" required>
				<label><b>Password</b></label>
				<input class="w3-input" type="password" placeholder="Enter Password" name="password" style="margin-bottom:10px;"required>
				<p style="text-align:right;"><a href="forgotpass.php" class="w3-text-blue" >Forgot password</a></p>
				<button class="w3-btn w3-green w3-round-xlarge " style="width:100%; margin-bottom:15px;" name="login" type="submit">Login</button>
			</form>
		</div>
		
		
		<?php
			if(isset($_POST['login']))
			{
				$username=mysqli_real_escape_string($con,$_POST['username']);
				$password=mysqli_real_escape_string($con,$_POST['password']);
				$query = "select * from cisfdetail where (username='$username' OR cisf_no='$username') and password='$password' ";
				
				$query_run = mysqli_query($con,$query);
				
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					if($row['password']=='rcf@123'){
						
						$_SESSION['cisf_no'] = $row["cisf_no"];
						header("location:cisfinfoupdate.php");
					}else{
					$_SESSION['cisfusername'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: cisfhome.php");
					}
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
<div class="w3-light-grey w3-border-top w3-bottom">
    <p class=" w3-right">Copyright © 2017 All rights reserved</p>
</div>
<body>
</html>