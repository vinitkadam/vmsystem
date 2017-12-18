<?php
	session_start();
	require_once('config.php');
	if(!isset($_SESSION['cisfusername']))
	{
		header("location: index.php");
	}
	if(!isset($_GET['id']))
	{
		header("location: todaysappointments.php");
	}
	$id = $_GET['id'];
	$_SESSION=$id;
	$sql = "SELECT * FROM visitorinfo where id=$id";
		if($result = mysqli_query($con,$sql))
		{
			
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$firstname=$row["firstname"];
					$tomeet=$row["tomeet"];
					$companyname=$row["companyname"];
					$comingfrom=$row["comingfrom"];
					$mobile=$row["mobile"];
					$emailid=$row["emailid"];
					$empid=$row["empid"];
				}
				
			}	
		}
		else
		{
			echo "databse connection error";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VisitorPass</title>
    <link href="assets/main.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/w3.css">
</head>
<body>

<header class="w3-container w3-red">
  <h1> <img height = 80px width = 65px src="assets/rcf.png" >&nbsp; Visitor Management System</h1>
</header>
<nav class="w3-topnav" align='right'>
		<a href="logout.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit">Log Out</button></a>
</nav>
<p class="w3-small">Note:1. If there is is any error in printed ID card then you can enter correct information and reprint the id<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. If printed id is correct then press back button to print another ID</p>
<p align='right'><a href="todaysappointments.php"><button  class="w3-btn w3-light-blue w3-round-xlarge" type="submit"><< BACK</button></a></p>
<div class="w3-row-padding w3-margin-top">
  <div align = 'center' class="w3-half" >
    <div class="w3-card-2">
		<table class="w3-table w3-bordered w3-light-blue w3-striped">
			<tr>
				<td>
					<div>
						PHOTO
					</div>
				</td>
			</tr>
			<tr>
				<!-- First, include the JPEGCam JavaScript Library -->

                        <script type="text/javascript" src="assets/webcam.js"></script>
                        

                        <!-- Configure a few settings -->

                        <script language="JavaScript" type="text/javascript">
                            webcam.set_api_url('main.php');
                            webcam.set_quality(90); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound(true); // play shutter click sound
                        </script>

                        <!-- Next, write the movie to the page at 280x320 -->

                        <script language="JavaScript" type="text/javascript">
                            webcam.set_swf_url("./assets/webcam.swf");
                            webcam.set_shutter_sound(true, "./assets/shutter.mp3");
                            document.write(webcam.get_html(280, 320));
                        </script>

                        <!-- Some buttons for controlling things -->
                        <!-- Code to handle the server response (see main.php) -->

                        <script type="text/javascript" src="assets/main.js"></script>
			</tr>
		</table>
	</div>
  </div>
		<div class="w3-half">
			<div class="w3-card-2">
				<form id='ui'>
                            <table id='userinput' class="w3-table w3-bordered w3-striped" >
                                <tr class="trStyle">
                                    <td align='center' valign="middle" colspan="2" style="background-color: #D7D8D2; color: black; font-size: 12px; font-weight: bold;"class="heading">
                                        USER INFORMATION
                                    </td>
                                </tr>
								<tr style="height:10px;"></tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Id &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='id' name='id' type='number' class="txt_box" value="<?php echo $_GET['id'] ?>"/>
                                    </td>
                                </tr>
                                <tr style="height:10px;"></tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Name &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='uname' name='uname' type='text' class="txt_box" value='<?php echo $firstname ?>'/>
                                    </td>
                                </tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        To Meet &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='meet' name='meet' type='text' class="txt_box" value='<?php echo $tomeet ?>' />
                                    </td>
                                </tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Company Name &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='from' name='from' type='text' class="txt_box" value='<?php echo $companyname ?>'/>
                                    </td>
                                </tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Representing &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input id='representinglist' name='representinglist' style='width: 200px; height: 22px; padding:0px;'
                                                class="txt_box" value='<?php echo $comingfrom ?>'/>
                                            
                                    </td>
                                </tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Mobile No &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='mobileno' name='mobileno' type='text' class="txt_box" value='<?php echo $mobile ?>'/>
                                    </td>
                                </tr>
                                <tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Email-Id &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='email' name='email' type='email' class="txt_box" value="<?php echo $emailid ?>">
                                    </td>
                                </tr>
								<tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Identity card no. &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='idno' name='idno' type='text' class="txt_box" />
                                    </td>
                                </tr>
								<tr class="trStyle">
                                    <td align='right' style='width: 200px;'>
                                        Pass no. &nbsp;&nbsp;
                                    </td>
                                    <td style='width: 300px;'>
                                        <input style='width: 200px;' id='passno' name='passno' type='text' class="txt_box" />
                                    </td>
                                </tr>
                                <tr style="height: 50px;">
                                    <td align='center' style='width: 200px;'></td>
                                    <td align="left" style='width: 300px;'>
                                        <input type="button" value="Print" onclick="take_snapshot()" class="w3-btn w3-red w3-round-xlarge" />&nbsp;&nbsp;
                                        
                                    </td>
                                </tr>
                            </table>
				</form>
			</div>
			<br>
            <br>
		</div>
	
	
  </div>
</div>
</body>
<footer class="w3-container w3-light-grey w3-border-top">
    <p class=" w3-right">Copyright © 2017 All rights reserved</p>
</footer>
</html>
