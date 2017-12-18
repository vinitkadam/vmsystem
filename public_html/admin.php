<?php
	session_start();
	if(!isset($_SESSION['adminusername']))
	{
		header("location: adminlogin.php");
	}
?>
<!DOCTYPE html>
<html>
<title>Visitorpass</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<body>
<div class="w3-red">

  <div class="w3-container">
    <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
  </div>
</div>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card-2 w3-animate-left" style="width:200px;" id="mySidebar">
		<button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
		<a class="w3-bar-item w3-button w3-green" href="admin.php">HOME</a>
		<a class="w3-bar-item w3-button" href="addemp.php">Add New Employee</a>
		<a class="w3-bar-item w3-button" href="removeemp.php">Remove Employee</a>
		<a class="w3-bar-item w3-button" href="addcisf.php">Add CISF</a>
		<a class="w3-bar-item w3-button" href="removecisf.php">Remove CISF</a>
		<a class="w3-bar-item w3-button" href="addadmin.php">Add new Admin</a>
		<a class="w3-bar-item w3-button" href="removeadmin.php">Remove Admin</a>
		<a class="w3-bar-item w3-button" href="reports.php"> Appointment Reports</a>
</div>

<div class="w3-main" style="margin-left:200px">
  <button class="w3-button w3-sand w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
<div class="w3-container w3-margin-top">
<nav class="w3-topnav" >
		
		
		<span style="float:right;">
		<a>Welcome,<span style="font-size:18px;"><i> <?php echo $_SESSION['adminusername']; ?></i></span></a>
		<a align="right" href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
		</span>
</nav>
</div>
<div class="w3-padding">
<nav align="right">
<a class="w3-text-orange w3-hover-text-red w3-round-xlarge " href="updateinfo.php">Update personal information</a>&nbsp;&nbsp;
<a class="w3-text-orange w3-hover-text-red w3-round-xlarge " href="changepass.php">change password</a>
</nav>
</div>



<!-- main div container starts--> 
<div class="w3-container ">

<p>
<span class='w3-text-red' style="text-decoration:underline">NOTE:</span><br>
If employee/CISF personnel forgets password then remove that employee/CISF personnel and then add them again. Now default password will be 'rcf@123' (without quotes)
</p>

</div>
<!-- main div container ends-->
   
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html>
