<?php

include 'db_config.php';
session_start();

	$login_session = $_SESSION['login_user'];

echo '
<!DOCTYPE html>
<html>
<head>
<title>ACCOUNT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="LMS style.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="assets/img/favicon.ico">

<style>
*box {
  box-sizing: border-box;
}

body {
  font-family:  Arial, Helvetica, sans-serif;
  /*background: linear-gradient(to right, #33cc33,#98e698);*/
	background:#E7F4DC;
	overflow: hidden;

}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  width: 100%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}



/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 10px 10px 10px 10px;
  margin : 30px 30px 30px 30px ;
  border:solid 1px #d9d9d9;
  border-radius: 1px;
  position: relative;
  box-shadow: 2px 5px 20px rgba(119,119,119,10.5);
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
}
h1
{
	font-family: "Montserrat", sans-serif;
	color: #4169e1;;
	margin-top:10px;
	margin-bottom:35px;
}
h2
{
	color: #777;
	font-family: "Roboto", sans-serif;
	text-transform: uppercase;
	font-size: 16px;
	letter-spacing: 1px;
	margin-left: 2px;
	margin-top: 10px;
}
.tinput, p {
	border:0;
	border-bottom: 1px solid #3fb6a8;
	width: 55%;
	float: Right;
	font-family: "montserat", sans-serif;
	font-size: 2.0em;
	padding: 7px 0;
	color: #070707;
	outline: none;
}
.input, p {
	padding: 20px;
	border:0;
	width: 80%;
  float: Right;
	font-family: "montserat", sans-serif;
	font-size: 2.0em;
	color: #070707;
	outline: none;
}
#fginput, p{
	float: left;
	font-family: "montserat", sans-serif;
	font-size: 0.4em;
	color: #070707;
}

.btn {
	font-family: "roboto", sans-serif;
	text-transform: uppercase;
	border: 0;
	color: #fff;
	background: #7ed386;
	padding: 7px 15px;
	box-shadow:0px 2px 4px 0px rgba(0,0,0,.2);
	cursor: pointer;
	margin-top: 15px;
		}


.he
{
	color: #777;
	font-family: "Roboto", sans-serif;
	text-transform: uppercase;
	font-size: 16px;
	letter-spacing: 1px;
	margin-left: 30px;
	padding-left: 100px;
	margin-top: 10px;
	float: right;
}
.lef
{
	color: #666666;
	font-family: "Roboto", sans-serif;
	text-transform: ;
	font-size: 18px;
	letter-spacing: 1px;


}

.rig
{
	float: left;
	letter-spacing: 1px;
	font-weight: 50%;
	margin-right: 100px;

}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {

  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.pic
{
font-size: 30px;
 float: right;
 padding-right: 200px;
 padding-left: 50px;
}
.wel
{
	float:center;
	font-size: 40px;
	 margin-right: 0px;
	 margin-left: 300px;

}



</style>
</head>
<body class="w3-light-grey">

	<!-- Top container -->
	<div class="w3-bar w3-top w3-small" style="z-index:4; background-color: #4169e1;">
	  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();" style="float:left;"><i class="fa fa-bars"></i>  Menu</button>
	  <span class="w3-bar-item w3-animate-left" style="float: right;"><img src="sbfc.png" width="70%"></span>
	</div>

	<!-- Sidebar/menu -->
	<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
	  <div class="w3-container w3-row">
	    <div class="w3-col s4">';


			$sql = "SELECT FIRSTNAME,LASTNAME,PROFILE_IMG FROM account where USER_ID = ?";
		 mysqli_error($conn);
		 if($stmt = mysqli_prepare($conn, $sql))
			 mysqli_stmt_bind_param($stmt, "s",$login_session);

		 if(mysqli_stmt_execute($stmt))
		 {
			 $result = mysqli_stmt_get_result($stmt);
			 while($row = mysqli_fetch_assoc($result))
			 {

				 if(!empty(base64_encode($row['PROFILE_IMG'])))
				{
				 echo' <img src="data:image/jpeg;base64,'.base64_encode( $row['PROFILE_IMG'] ).'" class="w3-circle w3-margin-right" style="height:70px;width:70px;margin-top: 40px;">';
				}
				else{
				 echo' <img src="assets/img/faces/face-9.jpg" class="w3-circle w3-margin-right" alt="image" style="height:70px;width:70px;margin-top: 40px;">';
			 }
				echo'  </div>  <div class="w3-col s8 w3-bar">   <h4 style="padding-top: 40px;"> <span>Welcome, <strong><br>';
				echo $row['FIRSTNAME']." ".$row['LASTNAME'];
			 }
	 }
	 else {
		 echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
	 }

			 echo '</strong></span><br></h4>


			</div>
	  </div>
	  <hr>

	  <div class="w3-bar-block">


	    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
	    <h4 style="font-size: 17px;"><a href="dashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
	    <h4 style="font-size: 17px;"><a href="course.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-graduation-cap"></i>  Courses</a></h4>
	    <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding" style="background-color: #4169e1; color: white"><i class="fa fa-user fa-fw"></i>  Account</a></h4>

	   <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments"></i>  Messages</a></h4>
	   <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a></h4>

	  </div>
	</nav>

	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="row">
  <div class="leftcolumn">
    <div class="card">';

	/*	$sql1 = "SELECT PROFILE_IMG FROM account where USER_ID = ?";
		mysqli_error($conn);
		if($stmt1 = mysqli_prepare($conn, $sql1))
		 mysqli_stmt_bind_param($stmt1, "s",$login_session);

		if(mysqli_stmt_execute($stmt1))
		{
		 $result1 = mysqli_stmt_get_result($stmt1);
		 while($row = mysqli_fetch_assoc($result1))
		 {

		 echo' <img src="'. $row['PROFILE_IMG'].'" class="w3-circle w3-margin-right" style="height:150px;width:150px;margin:20px;">';

		 }
	 }*/

	 $sql1 = "SELECT PROFILE_IMG FROM account where USER_ID = ? ";

	 if($stmt1 = mysqli_prepare($conn, $sql1))
 	 mysqli_stmt_bind_param($stmt1, "s",$login_session);

 	if(mysqli_stmt_execute($stmt1))
 	{
 	 $result1 = mysqli_stmt_get_result($stmt1);
 	 while($row = mysqli_fetch_assoc($result1))
 	 {
		 if(!empty(base64_encode($row['PROFILE_IMG'])))
		 {
			echo' <img src="data:image/jpeg;base64,'.base64_encode( $row['PROFILE_IMG'] ).'" class="w3-circle w3-margin-right" style="height:150px;width:150px;margin:20px;">';
		 }
		else{
			echo' <img src="assets/img/faces/face-9.jpg" class="w3-circle w3-margin-right" alt="image" style="height:150px;width:150px;margin:20px;">';
		}

	 }
 } else {
	 echo "0 results";
 }




		echo '<span class="input">	<form  action="" enctype=\'multipart/form-data\' method="post">';

			$sql1 = "SELECT FIRSTNAME,LASTNAME,DOB,USERNAME FROM account where USER_ID = ?";
			 mysqli_error($conn);
			 if($stmt1 = mysqli_prepare($conn, $sql1))
				 mysqli_stmt_bind_param($stmt1, "s",$login_session);

			 if(mysqli_stmt_execute($stmt1))
			 {
				 $result1 = mysqli_stmt_get_result($stmt1);
				 while($row = mysqli_fetch_assoc($result1))
				 {
					 echo  $row['FIRSTNAME']." ".$row['LASTNAME'].'</span>';
           echo '<br><b style="font-size: 15px; font-family: Roboto,sans-serif;text-transform: uppercase;letter-spacing: 1px;">Update Profile Pic</b><br>
					 <input type="file" id="fginput" name="file" style="width:100%; margin-bottom:5px;" onchange="loadforegroundimage()">
					 <input type="submit" id="fginput" name="image" ></form>';


					 if (isset($_POST['image'])) {

						//$filename=$_FILES['file']['name'];
						//$filepath="assets/img/faces/".basename($filename);
						//echo $filename;

				/*		if (empty($filename))
						{
							echo '<script>alert("Add Image")</script>';
						}
						else
						{

				 		$sql = "UPDATE account SET PROFILE_IMG = ? where USER_ID = ?";
				 		 mysqli_error($conn);
				 		 if($stmt = mysqli_prepare($conn, $sql))
				 			 mysqli_stmt_bind_param($stmt, "ss",$filepath,$login_session);

				 		 if(mysqli_stmt_execute($stmt))
				 		 {
				 				// echo "updated sucess";
								echo "<meta http-equiv='refresh' content='0'>";

				 		}
					}*/

					$image = $_FILES['file']['tmp_name'];
					$img = file_get_contents($image);
					$sql = "UPDATE account SET PROFILE_IMG = ? where USER_ID = ?";

					$stmt = mysqli_prepare($conn,$sql);

					mysqli_stmt_bind_param($stmt,"ss",$img,$login_session);
					mysqli_stmt_execute($stmt);

					$check = mysqli_stmt_affected_rows($stmt);
					if($check==1){
							echo "<meta http-equiv='refresh' content='0'>";
					}else{
							$msg = 'Error uploading image';
					}



				 	}




    echo '


	 </div>
    <div class="card">
	<div class="profile tabshow">
	<div><h1>Personal Information</h1></div>
<table>

  <tr>
    <td class="lef">First Name</td>
    <td class="rig">';
		 echo $row['FIRSTNAME'];


	echo'</td>

  </tr>
  <tr>
    <td class="lef">Last Name</td>
    <td>';

		echo $row['LASTNAME'];


	echo'</td>

  </tr>
  <tr>
    <td class="lef">Date Of Birth</td>
    <td class="rig">'.$row['DOB'].'</td>

  </tr>
  <tr>
    <td class="lef">Username</td>
    <td class="rig">'.$row['USERNAME'].'</td>

  </tr>
  <tr>
    <td class="lef">Password</td>
		<td class="rig"><button onclick="document.getElementById(\'id01\').style.display=\'block\'" class="w3-button w3-black">Change Password</button></td>

		<div id="id01" class="w3-modal">
    <div class="w3-modal-content" style="background-color:#b8eefc;">
      <header class="w3-container w3-blue">
        <span onclick="document.getElementById(\'id01\').style.display=\'none\'"
        class="w3-button w3-display-topright">&times;</span>
        <h2>Change Password</h2>
      </header>

		<form method="post">
    <div class="w3-container">
     <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span></br>
     Old Password:&nbsp &nbsp &nbsp &nbsp &nbsp <input type="password" value="" id="myInput" name="myInput"><i class="fa fa-eye" style="font-size:20px" onclick="myFunction()"></i></br></br>
     New Password:&nbsp &nbsp &nbsp &nbsp <input type="password" id="txtNewPassword" placeholder="Enter passward" name="pass"><i class="fa fa-eye" style="font-size:20px" onclick="myFun()"></i></br></br>
     Confirm Password: &nbsp <input type="password" id="txtConfirmPassword" placeholder="Confirm Passward" name="confpass" >
	   <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"> </br> </br>  </div>
    </div>

    <div style=\'margin-left:155px;\'>
    <input type="submit" value="Submit" style=\'background-color: #3486eb; color: white;border: none;color: white;font-size: 16px;cursor: pointer\'>
    </div>
    </form>
</br></br>
    </div>

  </tr>
</table>';

}
}
else {
echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$password = $_POST["myInput"];
	$hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$sql1 = "SELECT PASSWORD FROM account where USER_ID = ? ";

if($stmt1 = mysqli_prepare($conn, $sql1))
mysqli_stmt_bind_param($stmt1, "s",$login_session);

if(mysqli_stmt_execute($stmt1))
{
$result1 = mysqli_stmt_get_result($stmt1);
while($row = mysqli_fetch_assoc($result1))
{
	if(password_verify($password,$row['PASSWORD']))
	{
		$sql2 = "UPDATE account SET PASSWORD = ? where USER_ID = ? ";

		if($stmt2 = mysqli_prepare($conn, $sql2))
		mysqli_stmt_bind_param($stmt2, "ss",	$hash, $login_session);

		if(mysqli_stmt_execute($stmt2))
		 { mysqli_stmt_store_result($stmt2);
		 }
		else
		 { echo "Error: " . $sql2 . "<br>" . mysqli_error($conn); }
  }
	else {
		echo '<script>alert("Wrong Password")</script>';
	}

}
}
}



  echo'  </div>
  </div>


  <div class="card">
  	<div class="profile tabshow">
	 <h1>Localization</h1>

	 <table style="width:85%">

  <tr>
    <td class="lef">Timezone</td>
    <td class="rig">Indian Standard Time</td>

  </tr>
  <tr>
    <td class="lef">Language</td>
    <td class="rig">English</td>

  </tr>
  <tr>
    <td class="lef">Date Format</td>
    <td class="rig">MM/DD/YYYY</td>

  </tr>


</table>




  </div>
  </div>
  </div>
  </div>';

mysqli_close($conn);

	?>

	<script>
	// Get the Sidebar
	var mySidebar = document.getElementById("mySidebar");

	// Get the DIV with overlay effect
	var overlayBg = document.getElementById("myOverlay");

	// Toggle between showing and hiding the sidebar, and add overlay effect
	function w3_open() {
	  if (mySidebar.style.display === 'block') {
	    mySidebar.style.display = 'none';
	    overlayBg.style.display = "none";
	  } else {
	    mySidebar.style.display = 'block';
	    overlayBg.style.display = "block";
	  }
	}

	// Close the sidebar with the close button
	function w3_close() {
	  mySidebar.style.display = "none";
	  overlayBg.style.display = "none";
	}

	function myFunction() {
	var x = document.getElementById("myInput");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}


function checkPasswordMatch() {
				var password = $("#txtNewPassword").val();
				var confirmPassword = $("#txtConfirmPassword").val();
				if (password != confirmPassword)
						$("#CheckPasswordMatch").html("Passwords does not match!");
				else
						$("#CheckPasswordMatch").html("Passwords match.");
		}
		$(document).ready(function () {
			 $("#txtConfirmPassword").keyup(checkPasswordMatch);
		});


function myFun() {
	var x = document.getElementById("txtNewPassword");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}
	</script>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
