<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Visitor Pass</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/w3.css">
</head>
<body>
<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<?php

include 'config.php';

$username=$_SESSION['username'];
$otps=$_SESSION['otp'];
$otpf=$_POST['otp'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$db=$_SESSION['db'];
/*if($usertype=='Admin')
{
	$db='admin';
	$query="SELECT * from admin where (username='$username' OR admin_no='$username') AND otp='$otp' ";
}
else if($usertype=='CISF')
{
	$db='cisfdetail';
	$query="SELECT * from cisfdetail where (username='$username' OR cisf_no='$username') AND otp='$otp' ";
}
else if($usertype=='Employee')
{
	$db='empdetail';
	$query="SELECT * from empdetail where (username='$username' OR emp_no='$username') AND otp='$otp'";
}

$sql_users="SELECT * FROM users WHERE email='$email' AND otp='$otp'";
$query=""SELECT * from $db where ;
$result_users = mysqli_query($con, $query);

if(mysqli_num_rows($result_users)<=0)
{	
	echo "<br>ERROR:wrong email or otp .try again <a href='enterotp.php'>click here</a>";

}
else
{
	*/

if($otps==$otpf)
{
if($pass1==$pass2)
{
	if($db=='admin')
	{
		$changepass="UPDATE admin SET password='$pass1' WHERE username='$username' OR admin_no='$username'";
	}	
	else if($db=='cisfdetail')
	{
		$changepass="UPDATE cisfdetail SET password='$pass1' WHERE username='$username' OR cisf_no='$username'";
	}
	else if($db=='empdetail')
	{
		$changepass="UPDATE empdetail SET password='$pass1' WHERE username='$username' OR emp_no='$username'";
	}
	mysqli_query($con,$changepass);
	echo 'password changed succesfully. Login <a href="index.php">here</a>';
	unset($_SESSION['otp']);
	unset($_SESSION['db']);
	unset($_SESSION['username']);
}
else
{
	echo 'passwords did not match.Please try again <a href="enterotp.php">click here</a>';
}
}
else{
	echo "otp did not match.Please try again <a href='enterotp.php'>click here</a>";
}
	


?>
</body>
</html>