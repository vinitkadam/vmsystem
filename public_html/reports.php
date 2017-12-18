<?php
	session_start();
	require_once('config.php');
	if(!isset($_SESSION['adminusername']))
	{
		header("location: adminlogin.php");
	}
?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VisitorPass</title>
    <link href="assets/main.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="w3-red">

  <div class="w3-container">
    <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
  </div>
</div>

<div class="w3-container w3-padding">
<nav class="w3-topnav" >
		<span class="w3-large"><b>Appointment Reports</b></span>
				<span style="float:right;">
		<a>Welcome,<span style="font-size:18px;"><i> <?php echo $_SESSION['adminusername']; ?></i></span></a>
		<a align="right" href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
		</span>
</nav>
</div>

<div class="w3-container w3-card-2 w3-padding">
<form method="post" action="reports.php">
<table class="w3-table w3-striped">
	<tr>
		<td>Start date</td>
		<td><input type="date" name="date1" id="date1" required></td>
	</tr>
	<tr>
		<td>End date</td>
		<td><input type="date" name="date2" id="date2" required></td>
	</tr>
	<tr>
		<td>Order by</td>
		<td>
		<select id='orderby' name='orderby' class="txt_box" required>
			<option value=""></option>
            <option value='ID'>ID</option>
            <option value='FIRSTNAME'>firstame</option>
        </select>
		</td>
	</tr>
	<tr>
	<td></td>
		<td><input type="submit" name="submit" class="w3-btn w3-red w3-round-xlarge"/>&nbsp;&nbsp;
		<input type="reset" class="w3-btn w3-red w3-round-xlarge" /></td>
	</tr>
</table> 
</form>

<a href="admin.php"><button style="margin-top:10px; "class="w3-btn w3-sand w3-round-large"><< BACK</button></a>
</div>
<br>
<br>
<div>
	<table id="tstructure" class="w3-table w3-bordered w3-striped w3-table-all w3-small" >
	<?php
		if(isset($_POST['submit']))
		{
		$date1=$_POST['date1'];
		$date2=$_POST['date2'];
		$orderby=$_POST['orderby'];
		$query="SELECT * from visitorinfo where ap_date>='$date1' AND ap_date<='$date2' ORDER BY $orderby ";
		if($result=mysqli_query($con,$query))
	{
	if(mysqli_num_rows($result) > 0)
	{
		echo "
		<tr class='w3-light-blue'>
		
		<td align=center><b>ID</b></td>
		<td align=center><b>Appointment date</b></td>
		<td align=center><b>Name</b></td></td>
		<td align=center><b>To Meet</b></td>
		<td align=center><b>Company Name</b></td>
		<td align=center><b>Coming From</b></td>
		<td align=center><b>mobile</b></td>
		<td align=center><b>email ID</b></td>
		<td align=center><b>Identity</b></td>
		<td align=center><b>Pass no</b></td>
		<td align=center><b>Checkin</b></td>
		<td align=center><b>Checkout</b></td>
		<td align=center><b>Status</b></td>
		<td align=center><b>booked by</b></td>";

		while($data = mysqli_fetch_row($result))
		{   
			echo "<tr>";
			echo "<td align=center>$data[0]</td>";
			echo "<td align=center>$data[1]</td>";
			echo "<td align=center>$data[2]</td>";
			echo "<td align=center>$data[3]</td>";
			echo "<td align=center>$data[4]</td>";
			echo "<td align=center>$data[5]</td>";
			echo "<td align=center>$data[6]</td>";
			echo "<td align=center>$data[7]</td>";
			echo "<td align=center>$data[8]</td>";
			echo "<td align=center>$data[9]</td>";
			echo "<td align=center>$data[10]</td>";
			echo "<td align=center>$data[11]</td>";
			if($data[12]==='1')
			{
			echo "<td align=center>In</td>";
			}
			else if($data[12]==='0')
				echo "<td align=center>Out</td>";
			else
				echo "<td align=center></td>";
			echo "<td align=center>$data[14]</td>";
			echo "</tr>";
		}
	}
	else
	{
		echo"no appointments to display";
	}
		
	}
	else {
		echo "Database does not exist";
	}

	
	
		}
	?>
	
	</table>
					
</div>

</body>

</html>