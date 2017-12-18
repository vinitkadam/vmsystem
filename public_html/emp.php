<?php
session_start();
	require_once('config.php');
	//phpinfo();
	if(!isset($_SESSION['empusername']))
	{
		header("location: emplogin.php");
	}
?>
<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VisitorPass</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<div class="w3-container w3-padding">
<nav class="w3-topnav ">
		<span class="w3-xlarge">Book New Appointment</span>
		<span class="w3-right">
		<a>Welcome,<span style="font-size:18px;"><i> <?php echo $_SESSION['empusername']; ?></i></span></a>
		<a align="right" href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
		</span>
</nav>
</div>
<nav align="right">
<a class="w3-text-orange w3-hover-text-red w3-round-xlarge " href="updateinfo.php">Update personal information</a>&nbsp;&nbsp;&nbsp;
<a class="w3-text-orange w3-hover-text-red w3-round-xlarge " href="changepass.php">change password</a>
</nav>
<div class="w3-row-padding w3-margin-top">

			<div class="w3-card-2">
				<form id='ui' action="createappointment.php" method="post" >
                            <table id='userinput' class="w3-table w3-bordered w3-striped" >
                                <tr>
                                    <th  colspan="2" class="w3-light-blue" style="padding:15px">
                                         APPOINTMENT INFORMATION
                                    </th>
                                </tr>
								<tr>
                                    <td>
                                        Date &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input style='width: 200px;' id='date' name='date' type='date' required >
                                    </td>
                                </tr>
                                <tr class="trStyle">
                                    <td>
                                        Name &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input style='width: 200px;' id='uname' name='uname' type='text' required >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Company Name &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input style='width: 200px;' id='cname' name='cname' type='text' required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Representing &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <select id='representinglist' name='representinglist' style='width: 200px; ' >
                                            <option value='Vendor'>Vendor</option>
                                            <option value='Friend'>Friend</option>
                                            <option value='Family'>Family</option>
                                            <option value='Interview'>Interview</option>
                                            <option value='Customer'>Customer</option>
											<option value='Customer'>Trainee</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mobile No &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input style='width: 200px;' id='mobileno' name='mobileno' type='text' required/>
                                    </td>
                                </tr>
                                <tr >
                                    <td>
                                        Email-Id &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input style='width: 200px;' id='email' name='email' type='email' required/>
                                    </td>
                                </tr>
								<tr>
									<th colspan="2" class="w3-light-blue" style="padding:15px">EMPLOYEE DETAILS</th>
								</tr>
								<tr>
                                    <td>
                                       Employee-Id &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <?php echo $_SESSION['emp_no']?>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                       Employee mob. no &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <input style='width: 200px;' id='empmob' name='empmob' type='text' value="<?php echo $_SESSION['mob_no']?>" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='center' style='width: 200px;'></td>
                                    <td align="left" style='width: 300px;'>
                                        <button class="w3-btn w3-red w3-round-xlarge" id='submit' name ='submit'>SUBMIT</button> &nbsp;&nbsp;
                                    </td>
                                </tr>
                            </table>
				</form>
				
			</div>
			<br><br>

	
	
  </div>
</div>
</body>
<footer class="w3-container w3-light-grey w3-border-top">
    <p class=" w3-right">Copyright © 2017 All rights reserved</p>
</footer>
</html>
