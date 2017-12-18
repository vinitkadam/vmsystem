<?php
	session_start();
	require_once('config.php');
	if(!isset($_SESSION['cisfusername']))
	{
		header("location: index.php");
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VisitorPass</title>
    <link href="assets/main.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/w3.css">
</head>
<body>


<script>

</script>


<div class="w3-red">

  <div class="w3-container">
    <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
  </div>
</div>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card-2 w3-animate-left" style="width:200px;" id="mySidebar">
		<button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
		<a class="w3-bar-item w3-button" href="cisfhome.php">HOME</a>
		<a class="w3-bar-item w3-button w3-green" id="todayappointment" href="todaysappointments.php">TODAY'S APPOINTMENTS</a>

</div>

<div class="w3-main" style="margin-left:200px">
  <button class="w3-button w3-sand w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
<div class="w3-container w3-padding">
<nav class="w3-topnav " >
<span style="float:right;">
		<a>Welcome,<span style="font-size:18px;"><i> <?php echo $_SESSION['cisfusername']; ?></i></span></a>
		<a align="right" href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
</span>
</nav>
</div>
<hr width="100%">

<div class="w3-container">
<table class="w3-table  w3-bordered w3-striped">

	<?php
		date_default_timezone_set('Asia/Kolkata');
		$query="SELECT id,ap_date,firstname,tomeet,mobile from visitorinfo where ap_date= CURDATE() AND idcreated=0 ";
		if($result = mysqli_query($con,$query))
		{
			
			if(mysqli_num_rows($result) > 0)
			{
				echo "<tr> <th>ID</th> <th>APPOINTMENT DATE</th> <th>NAME </th> <th>TO MEET</th> <th>MOBILE</th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					
					$id=$row["id"];
					$ap_date=$row["ap_date"];
					$firstname=$row["firstname"];
					$tomeet=$row["tomeet"];
					$mobile=$row["mobile"];
					echo "<tr>
							<td><a href='newindex.php?id=$id'>".$id."</a></td>
							<td>".$ap_date."</td>
							<td>".$firstname."</td>
							<td>".$tomeet."</td>
							<td>".$mobile."</td>
							
						</tr>";
				}
				
			}
			else{
				echo "No appointments to display..";
			}
		}
		else
		{
		echo "Enter valid id and password";
		}

	
	
	
	?>


</table>
</div>
</div>
</body>
<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
</html>