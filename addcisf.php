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
		function ColGenerator()
        {
            $("#autoCOL").show();
            var i;
            var rNo = parseInt($("#NoOfCisf").val());
            for (i = 0; i < rNo; i++) {
              $('#autoCOL')
               .append('<tr><td><input id="cisfno' + i + '" type="text" class="input" /></td>' +
                   '</tr>');
            }
			$("#NoOfCisfTable").hide();

            //when add employees button is clicked this logic sends data and recieves result from adminexecutor
            $("#ADD").click(function(){
                  var values="";
                  i=0;
                  while (i!=rNo) {
                    if(i==rNo-1)
						values += "('" + $('#cisfno' + i).val() + "','rcf@123');" 
					else
						values += "('" + $('#cisfno' + i).val() + "','rcf@123'),"
					i++;
                  }
                  var query = "INSERT INTO cisfdetail(cisf_no,password) values " +values;
                  var tb_tag = "addcisf";
                  var dataValues = 'tag='+ tb_tag + '&Query='+ query;
                  $.ajax({
                  type: "POST",
                  url: "adminexecutor.php",
                  data: dataValues,
                  success: function(result){
                      $("#NoOfCisfTable").show();
					  alertMsg=result;
					  alert(alertMsg);
					  $("#alertBoxMain").show();
                      document.getElementById("alertBox").innerHTML=alertMsg;
					  window.setTimeout(function(){location.reload()},1500);
                    }
                  });

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
		<a class="w3-bar-item w3-button w3-green" href="addcisf.php">Add CISF</a>
		<a class="w3-bar-item w3-button" href="removecisf.php">Remove CISF</a>
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
                  <p id="alertBox"></p>
                </div>
            <!-- Alert Box Section by default its hidden end -->
<p style="font-size: 9pt;">Note: Default password of newly added employee(s) is 'rcf@123' (without quotes)</p>
	<table id="NoOfEmpTable">
		<tr>
		<td><label class="w3-label w3-text-blue">Number of CISF personnel to add<span class="w3-text-red">*</span>:&nbsp</label></td>
		<td><input id="NoOfCisf" class="w3-input w3-border" type="text" style="width:90%"></td>
		<td><button class="w3-btn w3-blue w3-round-large"onclick="ColGenerator();">Add</button></td>
		</tr>
	</table>
	<p>
		<table id="autoCOL" class="w3-table-all w3-small" style="display:none">
			<thead>
				<tr class="w3-light-grey">
                <th>CISF No.</th>
                </tr>
            </thead>
        </table>
	</p>
	<p class="w3-right"><button id="ADD" class="w3-btn w3-red w3-round-xlarge">Add CISF(s)</button></p>
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