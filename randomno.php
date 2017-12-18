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
	require_once('config.php');
require 'PHPMailer/PHPMailerAutoload.php';

$otp=(rand(1000000000,99999999999));

$usertype=mysqli_real_escape_string($con,$_POST['usertype']);
$username=mysqli_real_escape_string($con,$_POST['username']);

if($usertype=='Admin')
{
	$db='admin';
	$query="SELECT * from admin where username='$username' OR admin_no='$username' ";
}
else if($usertype=='CISF')
{
	$db='cisfdetail';
	$query="SELECT * from cisfdetail where username='$username' OR cisf_no='$username' ";
}
else if($usertype=='Employee')
{
	$db='empdetail';
	$query="SELECT * from empdetail where username='$username' OR emp_no='$username'";
}

	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);
	
	$username1=$row['username'];
	$email= $row['email'];



//$email="abc@xyz.com";
$sql_users = "UPDATE $db SET otp=$otp WHERE username='$username1'";

/*mysqli_query($con, $sql_users);*/
if(mysqli_query($con, $sql_users))
{
	
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Kolkata');


//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();


//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 3;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
//$mail->Host = gethostbyname('smtp.gmail.com');

$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.mail.yahoo.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "visitormanagementsystemteam@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "vmssystem";

//Set who the message is to be sent from
$mail->setFrom('visitormanagementsystemteam@gmail.com', 'Visitor Management System Team');

//Set an alternative reply-to address
//$mail->addReplyTo('raitloginemail@gmail.com');

//Set who the message is to be sent to
$mail->addAddress($email);

//Set the subject line
$mail->Subject = 'OTP for visitor management system login';
/*
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
*/

$mail->Body = 'Enter this otp to change password '.$otp;

//Replace the plain text body with one created manually
$mail->AltBody = 'otp:'.$otp;
/*
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
*/
//send the message, check for errors
if (!$mail->send()) {
    echo "<p class='w3-card-4 w3-padding'>user name/number or usertype incorrect<p>";
} else {
    echo "<br>otp sent!Check You email id:".$email;
	echo "<script>setTimeout(function () {window.location.href = 'enterotp.php'; },4000);</script>";
	$_SESSION['otp']=$otp;
	$_SESSION['db']=$db;
	$_SESSION['username']=$username;
	
}
}
else
{
	echo "wrong email id. Try again";
}
	

?>
</body>

</html>
