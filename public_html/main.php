<?php

/* JPEGCam Test Script */
/* Receives JPEG webcam submission and saves to local file. */
/* Make sure your directory has permission to write files as your web server user! */
require_once('config.php');

$userName = '';
if(isset($_REQUEST['un'])){
	$userName = addslashes($_REQUEST['un']);
}

$id = '';
if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
}

$toMeet = '';
if(isset($_REQUEST['mt'])){
	$toMeet = addslashes($_REQUEST['mt']);
}
$companyName = '';
if(isset($_REQUEST['cpname'])){
	$companyName = addslashes($_REQUEST['cpname']);
}

$comingFrom = '';
if(isset($_REQUEST['ra'])){
	$comingFrom = addslashes($_REQUEST['ra']);
}
$mobile = '';
if(isset($_REQUEST['mn'])){
	$mobile = $_REQUEST['mn'];
}
$email = '';
if(isset($_REQUEST['em'])){
	$email = $_REQUEST['em'];
}
$idno = '';
if(isset($_REQUEST['idn'])){
	$idno = $_REQUEST['idn'];
}
$passno = '';
if(isset($_REQUEST['pno'])){
	$passno = $_REQUEST['pno'];
}

date_default_timezone_set('Asia/Kolkata');
$timeInSec = time();
$currGMTime = date('Y-m-d H:i:s',$timeInSec);
$status = 1;

$sql = "UPDATE visitorinfo SET idno='$idno',passno='$passno',idcreated='1',checkin='$currGMTime',status='$status' WHERE id='$id'";

// Execute query
mysqli_query($con,$sql);

mysqli_close($con);
// Save photo
$filepath = './photos/' . $id . '.jpg';
$result = file_put_contents($filepath, file_get_contents('php://input') );

if (!$result) {
	print "ERROR: Failed to write data to $filepath, check permissions\n";
	exit();
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filepath;
if($comingFrom != 'Family')
	$comingFrom .= "(Escort required)";  
print "<urlsrc>$url</urlsrc><id>$id</id><fname>$userName</fname><tomeet>$toMeet</tomeet><cname>$companyName</cname><comingfrom>$comingFrom</comingfrom><mobile>$mobile</mobile><email>$email</email><idno>$idno</idno><passno>$passno</passno><checkin>$currGMTime</checkin><status>$status</status>";

?>
