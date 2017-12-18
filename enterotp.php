<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Visitor Pass</title>
<link rel="stylesheet" href="assets/w3.css">
</head>
<body>
<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<br>
<div class="w3-container">
<div class="w3-container w3-card-4 " style="max-width:500px;margin:0 auto;padding:10px;">
<div class="w3-card-2 w3-padding " style="background-color:#fffbcc"><b><u>NOTE:</u></b>DO NOT close the browser. otp will be destroyed if you close the browser.</div>
<form class="w3-form w3-margin-top"action="updatepass.php" method="post" autocomplete="off">
	

		
		<label>OTP</label><br>
		<input type="text" name="otp" style="margin-bottom:10px;" class="w3-input" required /><br>
		
		
		<label>NEW PASSWORD <label><br>
		<input type="password" name='pass1' maxlength='100' style="margin-bottom:10px;" class="w3-input" required/><br>
		
		
		<label>CONFIRM PASSWORD </label><br>
		<input type="password" name='pass2' maxlength='100' style="margin-bottom:10px;" class="w3-input" required><br>
		
		<input class="w3-btn w3-red w3-round-xlarge" style="width:100%; margin-bottom:15px;" type="submit" value="SUBMIT" />
		
	</table>
</form>
</div>
</div>
</body>

</html>