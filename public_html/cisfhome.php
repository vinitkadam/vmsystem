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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-colors-food.css">
	<link rel="stylesheet" href="assets/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<script>
	function Signout()
	{
		var vid = $("#vid").val();
		var tb_tag = "signout";
		var dataValues = 'tag='+tb_tag+'&vid='+vid;
		$.ajax({
                  type: "POST",
                  url: "adminexecutor.php",
                  data: dataValues,
                  success: function(result){
					alertMsg=result;
					
					document.getElementById("alertBox").innerHTML=alertMsg;
					$("#alertBoxMain").show();
					window.setTimeout(function(){location.href="cisfhome.php"},1500);
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
		<a class="w3-bar-item w3-button w3-green" href="cisfhome.php">HOME</a>
		<a class="w3-bar-item w3-button" id="todayappointment" href="todaysappointments.php">TODAY'S APPOINTMENTS</a>

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
<nav align="right">
	<a class="w3-text-orange w3-hover-text-red w3-round-xlarge " href="updateinfo.php">Update personal information</a>&nbsp;&nbsp;&nbsp;
	<a class="w3-text-orange w3-hover-text-red w3-round-xlarge " href="changepass.php">change password</a>
</nav>
<!-- Alert Box Section by default its hidden start-->
    <div id="alertBoxMain" class="w3-panel w3-green" style="display:none">
		<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <p id="alertBox"></p>
    </div>
<!-- Alert Box Section by default its hidden end -->
<div class="w3-card-2 w3-margin-top" >
	<form class="w3-form" id='logout'>
                            
        <table id='userlogout' class="w3-table w3-bordered w3-striped" >
            <tr>
                <th colspan="2" class="w3-light-blue">
                    LOG OUT
                </th>
            </tr>
            <tr>
                <td>
                    Visitor Id &nbsp;&nbsp;
                </td>
                <td>
                    <input style='min-width: 200px;' id='vid' name='vid' type='text' />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='button' value='Submit' onclick="Signout();" class="w3-btn w3-red w3-round-xlarge" />&nbsp;&nbsp;
                </td>
            </tr>
        </table>
	</form>
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