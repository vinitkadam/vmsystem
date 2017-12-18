<?php
	session_start();
	require_once('config.php');
	//phpinfo();
	if(!isset($_SESSION['admin_no']))
	{
		header("location: adminlogin.php");
		
	}
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
<nav class="w3-topnav" align='right' >
<a align="right" href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
</nav>

<div class="w3-row-padding w3-margin-top">

		<div class="w3-half">
		<h2>Update Information</h2>
			<div class="w3-card-2">
				<form action="admininfoupdate.php" method="post">
			
				<div class="w3-container">
					<label><b>Full Name</b></label><br>
					<input type="text" placeholder="Enter Fullname" name="fullname" required><br>
					<label><b>New username</b></label><br>
					<input type="text" placeholder="Enter username" name="username" required><br>
					<label><b>Password</b></label><br>
					<input type="password" placeholder="Enter Password" name="password" required><br>
					<label><b>Confirm Password</b></label><br>
					<input type="password" placeholder="confirm Password" name="cpassword" required><br>
					<label><b>Email</b></label><br>
					<input type="text" placeholder="Enter Email-id" name="email" required><br>
					<label><b>Mobile No.</b></label><br>
					<input type="text" placeholder="Enter Mobile No." name="mobile" required><br>
					<br>
					
					
					
					
					<button name="update" class="w3-btn w3-red w3-round-xlarge" type="submit">Update</button>
					<br>
					<br>
				
					<a href="adminlogin.php"><button type="button" class="w3-btn w3-blue-gray w3-round-xlarge"><< Back to Login</button></a>
				</div>
				</form>
			</div>
			<br>
            <br>

		</div>
	
	
</div>
</div>

<?php
	require_once('config.php');

			if(isset($_POST['update']))
			{
				@$fullname=$_POST['fullname'];
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$email=$_POST['email'];
				@$mobile=$_POST['mobile'];
				$adminno=$_SESSION['admin_no'];
				if($password==$cpassword)
				{
					$query = "select * from admin where username='$username'";
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "UPDATE admin SET name='$fullname',username='$username',password='$password',email='$email',mob_no='$mobile' where admin_no='$adminno';";
							echo $query;
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Information updated login with new userid and password")</script>';
								
								header("refresh:0; url=adminlogin.php");
							}
							else
							{
								echo '<script type="text/javascript">alert("Operation Unsuccessful due to server error. Please try later;")</script';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
</body>
</html>
