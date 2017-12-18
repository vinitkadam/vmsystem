<?php
	session_start();
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
<script>
	function removecisf()
	{
		var cisfno = $("#cisfno").val();
        var query = " DELETE FROM cisfdetail WHERE cisf_no='"+cisfno+"';";
        var tb_tag = "removecisf";
        var dataValues = 'tag='+ tb_tag + '&Query='+ query;
        $.ajax({
        type: "POST",
        url: "adminexecutor.php",
        data: dataValues,
        success: function(result){
			alertMsg=result;
			$("#alertBoxMain").show();
			document.getElementById("alertBox").innerHTML=alertMsg;
			window.setTimeout(function(){document.getElementById("alertBoxMain").style.display='none';},2000);		  
			}
        });
    }
	
	function remove(cisf_no)
	{
		var query = "DELETE FROM cisfdetail WHERE cisf_no='"+cisf_no+"';";
        var tb_tag = "removecisf";
        var dataValues = 'tag='+ tb_tag + '&Query='+ query;
        $.ajax({
        type: "POST",
        url: "adminexecutor.php",
        data: dataValues,
        success: function(result){
			alertMsg=result;
			$("#alertBoxMain").show();
			document.getElementById("alertBox").innerHTML=alertMsg;
			document.getElementById(cisf_no).style.display="none";
			
			}
        });
	}
</script>

<div class="w3-red">

  <div class="w3-container">
    <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
  </div>
</div>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card-2 w3-animate-left" style="width:200px;" id="mySidebar">
		<button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
		<a class="w3-bar-item w3-button" href="admin.php">HOME</a>
		<a class="w3-bar-item w3-button" href="addemp.php">Add New Employee</a>
		<a class="w3-bar-item w3-button" href="removeemp.php">Remove Employee</a>
		<a class="w3-bar-item w3-button" href="addcisf.php">Add CISF</a>
		<a class="w3-bar-item w3-button w3-green" href="removecisf.php">Remove CISF</a>
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
              
<div class="w3-container ">
			<!-- Alert Box Section by default its hidden start-->
                <div id="alertBoxMain" class="w3-panel w3-green" style="display:none">
				<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
                  <p id="alertBox"></p>
                </div>
            <!-- Alert Box Section by default its hidden end -->
	
		<table id="cisfnotable">
		<tr>
		<td><label class="w3-label w3-text-blue">CISF Id:<span class="w3-text-red">*</span>:&nbsp</label></td>
		<td><input id="cisfno" class="w3-input w3-border" type="text" style="width:90%"></td>
		<td><button class="w3-btn w3-red w3-round-large" onclick="removecisf();">REMOVE</button></td>
		</tr>
		</table>
		
		
    
	<br>
	<table class="w3-table  w3-bordered w3-striped">

	<?php
		require_once('config.php');
		$query="SELECT * from cisfdetail";
		if($result = mysqli_query($con,$query))
		{
			
			if(mysqli_num_rows($result) > 0)
			{
				echo "<tr> <th></th><th>username</th>  <th>Name</th> <th>Email</th> <th>CISF No.</th> <th>Mobile No.</th> </tr>";
				while($row = mysqli_fetch_array($result))
				{
					
					$username=$row["username"];
					$name=$row["name"];
					$email=$row["email"];
					$cisf_no=$row["cisf_no"];
					$mob_no=$row["mob_no"];
					echo "<tr id='$cisf_no'>
							<td><button class='w3-btn w3-blue-grey w3-small w3-round-xxlarge' onclick='remove($cisf_no);'>&times; remove</button></td>
							<td>".$username."</td>
							<td>".$name."</td>
							<td>".$email."</td>
							<td>".$cisf_no."</td>
							<td>".$mob_no."</td>
							
						</tr>";
				}
				
			}
			else
					echo "No CISF details to display";
		}
		else
		{
		echo "Enter valid id and password";
		}

	
	
	
	?>
			
			
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