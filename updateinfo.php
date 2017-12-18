<?php
	session_start();
	require_once('config.php');
	
	if(isset($_SESSION['adminusername']))
	{
		$db='admin';
		$username=$_SESSION['adminusername'];
		$query="SELECT * from admin where username='$username';";
	}
	else if(isset($_SESSION['cisfusername']))
	{	
		$db='cisfdetail';
		$username=$_SESSION['cisfusername'];
		$query="SELECT * from cisfdetail where username='$username';";
	}
	elseif(isset($_SESSION['empusername']))
	{
		$db='empdetail';
		$username=$_SESSION['empusername'];
		$query="SELECT * from empdetail where username='$username';";
	}
	else
	{
		header("location: index.php");
	}
	
	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);

	$name=$row["name"];
	$mobile=$row["mob_no"];
	$email=$row["email"];

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<script>
	
	function update(){
		var name = $("#name").val();
		var mobile = $("#mobile").val();
		var email = $("#email").val();
		var db = '<?php echo $db; ?>';
		var uname = '<?php echo $username ?>';
		var query = "UPDATE "+db+" SET name='"+name+"',mob_no='"+mobile+"',email='"+email+"' where username ='"+uname+"';";
		var tb_tag = "updateinfo";
        var dataValues = 'tag='+ tb_tag + '&Query='+ query;
		$.ajax({
                  type: "POST",
                  url: "adminexecutor.php",
                  data: dataValues,
                  success: function(result){
					  alertMsg=result;
					  $("#alertBoxMain").show();
                      document.getElementById("alertBox").innerHTML=alertMsg;
					  
				  }
        });
		
	}


</script>
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
					<td>Name </td>
					<td><input id="name" width="200px" name="name" type="text" value="<?php  echo $name;   ?>" required ></td>
				</tr>
				<tr>
					<td> Mobile Number</td>
					<td><input id="mobile" width="200px" name="mobile" type="number" type="number" maxlength="10" value="<?php echo $mobile; ?>"required ></td>
				</tr>
				<tr>
					<td>Email Id</td>
					<td><input id="email" width="200px" name="email" type="email" value="<?php echo $email; ?>" required ></td>
				</tr>
				<tr>
					<td></td>
					<td><button class="w3-btn w3-red w3-round-large" onclick="update();">Update</button></td>
				</tr>

			<table>
		</div>
	</div>
</body>
</html>