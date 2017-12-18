<?php
session_start();
	require_once('config.php');
	//phpinfo();
	if(!isset($_SESSION['empusername']))
	{
		header("location: emplogin.php");
	}
					if(isset($_POST['submit']))
					{
						if(!isset($_SESSION['empusername']))
						{
							header("location: emplogin.php");
						}
						else
						{
						
						$date = $_POST['date'];
						$name = $_POST['uname'];
						$cname = $_POST['cname'];
						$representinglist = $_POST['representinglist'];
						$mobileno = $_POST['mobileno'];
						$email = $_POST['email'];
						$empid = $_SESSION['emp_no'];
						$tomeet = $_SESSION['empusername'];
						
						$query = "INSERT INTO visitorinfo(ap_date,firstname,tomeet,companyname,comingfrom,mobile,emailid,empid)values('$date','$name','$tomeet','$cname','$representinglist','$mobileno','$email','$empid');";
						
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript">alert("appointment created successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("error creating appointment")</script>';
						}							
						}	
					}
					header("refresh:0; url=emp.php");
?>