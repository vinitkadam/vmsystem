<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="assets/w3.css">
</head>
<body>
<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<br>

<br>
<br>

<div class="w3-container w3-card-4 w3-round-large w3-border" style="max-width:500px;margin:0 auto;padding:10px;">
<center><h2>Forgot Password</h2></center>
<form action="randomno.php" method="post">
			<br>
	
			<div class="w3-container w3-padding">
				<label><b>User Type </b></label><br>
				<select id='usertype' name='usertype' class="w3-select w3-border" style="margin-bottom:10px;" required >
					<option value=''></option>
					<option value='Admin'>Admin</option>
                    <option value='CISF'>CISF</option>
                    <option value='Employee'>Employee</option>
                </select><br><br>
				<label><b>Username OR Number </b></label><br>
				<input type="text" placeholder="Enter Username Or Employee No" name="username" class="w3-input w3-border"required><br><br>
				
				<button class="w3-btn w3-round-xlarge w3-green" style="width:100%;margin-bottom:15px;" name="login" type="submit">SUBMIT</button><br>
				<a href="index.php"> <button type="button" class="w3-btn w3-round-xlarge w3-margin-bottom w3-sand"> << Back </button></a>
			</div>
</form>
</div>  
</body>

</html>