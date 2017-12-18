<?php

require_once('config.php');

//tag which is fetched from sender
$tags=$_POST['tag'];

//main logic
switch ($tags)
{
case "addemp":
	$sql=$_POST['Query'];
	if ($con->query($sql) === TRUE) {
      echo "Employee(s) added successfully";
    } else {
      echo "Error adding Employee(s)" . $con->error;
    }
    $con->close();
    break;

case "removeemp":
	$sql=$_POST['Query'];
	$con->query($sql);
	if (mysqli_affected_rows($con)>0) {
      echo "Employee removed successfully";
    } else {
      echo "Error removing Employee" . $con->error;
    }
    $con->close();
    break;
	
case "addcisf":
	$sql=$_POST['Query'];
	if ($con->query($sql) === TRUE) {
      echo "CISF(s) added successfully";
    } else {
      echo "Error adding CISF(s)" . $con->error;
    }
    $con->close();
    break;
	
case "removecisf":
	$sql=$_POST['Query'];
	$con->query($sql);
	if (mysqli_affected_rows($con)>0) {
      echo "CISF removed successfully";
    } else {
      echo "error removing CISF" . $con->error;
    }
    $con->close();
    break;

case "addadmin":
	$sql=$_POST['Query'];
	if ($con->query($sql) === TRUE) {
      echo "Admin(s) added successfully";
    } else {
      echo "Error adding Admin(s)" . $con->error;
    }
    $con->close();
    break;
	
case "removeadmin":
	$sql=$_POST['Query'];
	$adminno=$_POST['adminno'];
	if($adminno=='1234')
	{
		echo "Cannot remove main admin";
	}
	else{
	$con->query($sql);
	if (mysqli_affected_rows($con)>0) {
		echo "Admin removed successfully";
    } else {
      echo "error removing admin" . $con->error;
    }
    $con->close();
	}
    break;
	
case "updateinfo":
	$sql=$_POST['Query'];
	if ($con->query($sql) === TRUE) {
      echo "Information Updated successfully";
    } else {
      echo "Error. Please try Again" . $con->error;
    }
    $con->close();
    break;

case "changepass":
	$sql=$_POST['Query'];
	$oldpass=$_POST['oldpass'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$db=$_POST['db'];
	$uname = $_POST['uname'];
	$query = $_POST['fetchpass'];
	
	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);

	$password = $row['password'];

		if($oldpass === $password)
		{
			if($pass==$cpass)
			{
				if ($con->query($sql) === TRUE) {
				echo "Password changed successfully";
				} else {
				echo "Error. Please try Again" . $con->error;
				}
			}
			else{
				echo "new password and confirm password do not match";
			}
		}
		else{
			echo "Old password did not match";
		}
		$con->close();
    break;

	
case "signout":
	date_default_timezone_set('Asia/Kolkata');
	$timeInSec = time();
	$currGMTime = date('Y-m-d H:i:s',$timeInSec);
	$vid = $_POST["vid"];
	$query = "SELECT * FROM visitorinfo where id='$vid' or passno='$vid'";
	$result = mysqli_query($con,$query);
	if(mysqli_affected_rows($con)>0)
	{
		$row = mysqli_fetch_array($result);
		$checkout = $row['checkout'];

		$sql = "UPDATE visitorinfo SET status='0',checkout='$currGMTime' WHERE id=$vid";
		if($checkout==NULL){
		if ($con->query($sql) === TRUE) {
			echo "Signout Successfull";
		} else {
			echo "Signout Unsuccessfull. " . $con->error;
		}
		}
		else{
			echo "aleady signed out";
		}
	}
	else {
		echo"visitor id does not exist";
	}
	break;
	
	
default: echo "Nothing to display";

}


?>