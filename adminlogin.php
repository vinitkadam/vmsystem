<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/w3.css">
</head>
<body>
<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<br>

<br>
<br>
	<div class="w3-container w3-card-4 w3-round-large w3-border" style="max-width:500px;margin:0 auto;padding:10px;margin-top:15px">
		
		<h2 class="w3-center">Admin Login</h2>
		<form action="adminlogin.php" method="post">
		
				<label><b>Username</b></label>
				<input class="w3-input" "type="text" placeholder="Enter Username" name="username" style="margin-bottom:10px;" required>
				<label><b>Password</b></label>
				<input class="w3-input" type="password" placeholder="Enter Password" name="password" style="margin-bottom:10px;"required>
				<p style="text-align:right;"><a href="forgotpass.php" class="w3-text-blue" >Forgot password</a></p>
				<button class="w3-btn w3-green w3-round-xlarge " style="width:100%; margin-bottom:15px;" name="login" type="submit">Login</button>
				<a href="index.php"> <button type="button" class="w3-btn w3-round-xlarge w3-margin-bottom w3-sand"> << Back </button></a>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				$username=mysqli_real_escape_string($con,$_POST['username']);
				$password=mysqli_real_escape_string($con,$_POST['password']);
				$query = "select * from admin where (username='$username' OR admin_no='$username') and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					if($row['password']=='rcf@123'){
						
						$_SESSION['admin_no'] = $row["admin_no"];
						header("location:admininfoupdate.php");
					}else{
					$_SESSION['adminusername'] = $row['username'];
					$_SESSION['admin_no'] = $row["emp_no"];
					header( "Location: admin.php");
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
		
	</div>
</body>
</html>