<?php
	session_start();
	require_once('config.php');
	
	if(isset($_SESSION['adminusername']))
	{
		$db='admin';
		$username=$_SESSION['adminusername'];
	}
	else if(isset($_SESSION['cisfusername']))
	{	
		$db='cisfdetail';
		$username=$_SESSION['cisfusername'];
	}
	elseif(isset($_SESSION['empusername']))
	{
		$db='empdetail';
		$username=$_SESSION['empusername'];
	}
	else
	{
		header("location: index.php");
	}
		
?>

<!DOCTYPE html>
<html>
<head>
<title>visitor Pass</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div>
<script>
	
	function changepass(){
		
		var oldpass = $("#oldpass").val();
		var pass = $("#pass").val();
		var cpass = $("#cpass").val();
		var db = '<?php echo $db; ?>';
		var uname = '<?php echo $username; ?>';
		var query = "UPDATE "+db+" SET password='"+pass+"' where username='"+uname+"';";
		var tb_tag = "changepass";
		var fetchpass="SELECT * from "+db+" where username='"+uname+"'";
        var dataValues = 'tag='+ tb_tag + '&Query='+query+'&fetchpass='+fetchpass+'&oldpass='+oldpass+'&pass='+pass+'&cpass='+cpass+'&db='+db+'&uname='+uname ;
		$.ajax({
                  type: "POST",
                  url: "adminexecutor.php",
                  data: dataValues,
                  success: function(result){
					  alertMsg=result;
					  if(alertMsg==="Password changed successfully")
					  {
					  alertMsg+='.NOW LOGIN WITH NEW PASSWORD'
					  $("#alertBoxMain").show();
                      document.getElementById("alertBox").innerHTML=alertMsg;
					  if(db=='admin'){
					  window.setTimeout(function(){location.href="adminlogin.php"},3000);
                      }
					  else if(db=='empdetail'){
					  window.setTimeout(function(){location.href="emplogin.php"},3000);
                      }
					  else if(db=='cisfdetail'){
					  window.setTimeout(function(){location.href="index.php"},3000);
                      }
					  }
					  else{
						  $("#alertBoxMain").show();
                      document.getElementById("alertBox").innerHTML=alertMsg;
					  }
                    }
        });
		
	}


</script>
</div>
<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<nav class="w3-topnav" align='right' >
<a align="right" href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
</nav>
			<!-- Alert Box Section by default its hidden start-->
                <div id="alertBoxMain" class="w3-panel w3-green" style="display:none">
                  <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
                  <p id="alertBox"></p>
                </div>
            <!-- Alert Box Section by default its hidden end -->
	<div class='w3-container'>
		<div class="w3-card-2">
			<table class="w3-table w3-bordered w3-striped">
				<tr>
					<td>Old Password</td>
					<td><input id="oldpass" width="200px" type="password" required ></td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input id="pass" width="200px" type="password" required /></td>
				</tr>
				<tr>
					<td>Confirm New Password</td>
					<td><input id="cpass" width="200px" type="password" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><button class="w3-btn w3-red w3-round-large" onclick="changepass();" >CHANGE PASSWORD</button></td>
				</tr>
			<table>
		</div>
	</div>
</body>
</html>