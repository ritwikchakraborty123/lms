<?php

include 'db_config.php';
//session_start();

include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: loginpage.php"); // Redirecting To Home Page
}

	$login_session = $_SESSION['login_user'];

echo '
<!DOCTYPE html>
<html>
<head>
<title>LMS Dashboard</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="assets/img/favicon.ico">

<style>
	*box
	{
		box-sizing: border-box;
	}
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
body
{
	overflow: hidden;
}

    .top {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  box-shadow: 2px 5px 20px rgba(119,119,119,10.5);
}

.topli {
  float: left;
}

.topli a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 15px;
}

.topli a:hover:not(.active) {
  background-color: silver;
}

.active {
  background-color: #4CAF50;
}



/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  margin-left: 5px;
 margin-right: 0px;
margin-top: 5px;



}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: ;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 0px;
  border: solid 1px #d9d9d9;
  border-radius: 6px;
  /*box-shadow: 2px 5px 20px rgba(119,119,119,10.5);*/
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

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .topnav a {
    float: none;
    width: 100%;
    font-size: 12px;


  }
}
.topnav
{
  border-bottom: 2px solid  green;
}
h5
{
  float:center;
  padding-left: 55px;
}
.border
{
  border-top:solid 1px #4169e1 ;
}
p
{
  font-size:15px;
}
progress
{
  width: 50%;
}
.btn {
  font-family: "roboto", sans-serif;
  text-transform: uppercase;
  border: 0;
  color: #fff;
  background-color: green;
  padding-left: 18px
  margin-left: 20px;
  margin-bottom: 20px;
 padding-left:0px;
  float:top-right;
  box-shadow:0px 2px 4px 0px rgba(0,0,0,.2);
  cursor: pointer;
  margin-top: 15px;

}

#myBtn{
background-color: #4169e1;border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin-left:50%;
 margin-top:15px;
  cursor: pointer;
 box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
#myBtn:hover{
background-color:#2475B0;}

@media screen and (max-width: 800px) {
  #myBtn {
  	margin-left: 30%;


  }
}



/*--------------------------------------------------------------------------------------------------------------------*/
/* Maduri*/

.leftcolumnm {
  float: left;
  margin-left: 10px;
width: 30%;
  background-color: ;
  padding-left: 20px;
}

.leftcolumn1 {
  float: left;
  margin-left: 10px;
  width: 45%;
  background-color: ;
  padding-left: 20px;
}
 /* middle columns */

  .middlecolumnm {
  float: left;
  margin-left: 10px;

width: 30%;
  background-color: ;
  padding-left: 20px;
}
.middlecolumn1{
  float: left;
  margin-left: 10px;
  width: 45%;
  background-color: ;
  padding-left: 20px;
}

/* Right column */
.rightcolumnm {
  float: left;
  margin-left: 10px;
  width: 30%;
  background-color: ;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
/*for 1st row*/
.cardm {
  background-color: white;
  padding: 0px;
  margin-top: 10px;
  border: solid 1px #d9d9d9;
  border-radius: 6px;
  box-shadow: 2px 5px 20px rgba(119,119,119,10.5);
}

/*for 2nd row*/
.card1 {
  background-color: white;
  padding: 0px;
  margin-top:0px;
margin-bottom:50px;
  border: solid 1px #d9d9d9;
  border-radius: 6px;
  box-shadow: 2px 5px 20px rgba(119,119,119,10.5);
}

/* Clear floats after the columns */
.rowm:after {
  content: "";
  display: table;
  clear: both;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}
/* Footer */
.footerm {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumnm, .middlecolumnm, .rightcolumnm {
    width: 95%;



    padding-left: 2px;

  }
}
@media screen and (max-width: 800px) {
  .leftcolumn1, .middlecolumn1 {
    width: 100%;
    padding: 10px;
    margin-left: 0px;

    padding-top: 5px;

  }
}


/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */

h2
{
  float:center;
  padding-left: 55px;
padding-top:0px;
font-size:15px;
}

.buttonm {
  background-color: #4169e1;
  border: none;
  color: white;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
  cursor: pointer;
border-radius:4px;
}

.buttonm:hover{background-color:#7b97ea;}

.tabcontent {
  color: green;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

/* Graph Css*/
.leftcolumnb {
  float: center;
  margin-left: 20px;
 margin-right: 0px;


margin-bottom: 20px;
}
.rowb:after {
  content: "";
  display: table;
  clear: both;
}
.cardb {
  background-color: white;
  padding: 20px;
  margin-top: 0px;

  padding-bottom: 20px;
  border: solid 1px #d9d9d9;
  border-radius: 6px;
  box-shadow: 2px 5px 20px rgba(119,119,119,10.5);
}
@media screen and (max-width: 800px) {
  .leftcolumnb,{
    width: 50%;
    padding: 10px;
    margin-left: 0px;

    padding-top: 10px;

  }
}

#chart {
  width: 650px;
  height: 300px;
  margin: 30px auto 0;
  display: block;
}
#chart #numbers {
  width: 50px;
  height: 100%;
  margin: 0;
  padding: 0;
  display: inline-block;
  float: left;
}
#chart #numbers li {
  text-align: right;
  padding-right: 1em;
  list-style: none;
  height: 29px;
  border-bottom: 1px solid #444;
  position: relative;
  bottom: 30px;
}
#chart #numbers li:last-child {
  height: 30px;
}
#chart #numbers li span {
  color: #eee;
  position: absolute;
  bottom: 0;
  right: 10px;
}
#chart #bars {
  display: inline-block;
  background: rgba(0, 0, 0, 0.2);
  width: 600px;
  height: 300px;
  padding: 0;
  margin: 0;
  box-shadow: 0 0 0 1px #444;
}
#chart #bars li {
  display: table-cell;
  width: 100px;
  height: 300px;
  margin: 0;
  text-align: center;
  position: relative;
}
#chart #bars li .bar {
  display: block;
  width: 70px;
  margin-left: 15px;
  background: #FD4447;
  position: absolute;
  bottom: 0;
}
#chart #bars li .bar:hover {
  background: #5AE;
  cursor: pointer;
}
#chart #bars li .bar:hover:before {
  color: white;
  content: attr(data-percentage) \'%\';
  position: relative;
  bottom: 20px;
}
#chart #bars li span {
  color: #eee;
  width: 100%;
  position: absolute;
  bottom: -2em;
  left: 0;
  text-align: center;
}

#chart {
  width: 650px;
  height: 300px;
  margin: 30px auto 0;
  display: block;
}
#chart #numbers {
  width: 50px;
  height: 100%;
  margin: 0;
  padding: 0;
  display: inline-block;
  float: left;
}
#chart #numbers li {
  text-align: right;
  padding-right: 1em;
  list-style: none;
  height: 29px;
  border-bottom: 1px solid #444;
  position: relative;
  bottom: 30px;
}
#chart #numbers li:last-child {
  height: 30px;
}
#chart #numbers li span {
  color: black;
  position: absolute;
  bottom: 0;
  right: 10px;
}
#chart #bars {
  display: inline-block;
  background: white;
  width: 600px;
  height: 300px;
  padding: 0;
  margin: 0;
  box-shadow: 0 0 0 1px #444;
}
#chart #bars li {
  display: table-cell;
  width: 100px;
  height: 300px;
  margin: 0;
  text-align: center;
  position: relative;
}
#chart #bars li .bar {
  display: block;
  width: 50px;
  margin-left: 15px;
  background: green;
  position: absolute;
  bottom: 0;
}
#chart #bars li .bar:hover {
  background: black;
  cursor: pointer;
}
#chart #bars li .bar:hover:before {
  color: black;
  content: attr(data-percentage) \'%\';
  position: relative;
  bottom: 20px;
}
#chart #bars li span {
  color: black;
  width: 100%;
  position: absolute;
  bottom: -2em;
  left: 0;
  text-align: center;
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #4169e1;

}

/* Style the buttons inside the tab */
.tab button {
  background-color: #4169e1;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 15px;
  color: white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #f2f2f2;
  color: black;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #003399;
}

/* Style the tab content */
.tabcontent {
  display: none;
  background-color: grey;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: green;}




.tablink1 {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 15px;
  width: 25%;
}

.tablink1:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent1 {
  color: white;
  display: none;
  padding: 20px 20px;
  height: 100%;
}

#Home {background-color: white;}
#News {background-color: #f2f2f2;}











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
    <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding" style="background-color: #4169e1; color: white;"><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
  <!--  <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart"></i>  Analytics(course-wise)</a></h4> -->
    <h4 style="font-size: 17px;"><a href="course.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-graduation-cap"></i>  Courses</a></h4>
    <h4 style="font-size: 17px;"><a href="account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Account</a></h4>

   <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments"></i>  Messages</a></h4>
   <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a></h4>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->

    <header class="w3-container" style="padding-top:15px">
    <h3><b><i class="fa fa-dashboard" style="font-size:30px;"></i> My Dashboard</b></h3>
  </header>

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, \'Home\')" id="defaultOpen">Home</button>
  <button class="tablinks" onclick="openCity(event, \'Content\')">Content Library</button>
  <button class="tablinks" onclick="openCity(event, \'Achievement\')">Achievments</button>
</div>

<div id="Home" class="tabcontent">

  <div class="rowm">

  <div class="leftcolumnm">
    <div class="cardm">
<i class="fa fa-graduation-cap" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: black;"></i>
      <h2 style="color: black;"><b style="font-size:25px;">';

				$sql1 = "SELECT count(COURSE_ID) as cnt FROM course_status where USER_ID = ?";
				mysqli_error($conn);
				if($stmt1 = mysqli_prepare($conn, $sql1))
					mysqli_stmt_bind_param($stmt1, "s",$login_session);

				if(mysqli_stmt_execute($stmt1))
				{
					$result1 = mysqli_stmt_get_result($stmt1);
					while($row = mysqli_fetch_assoc($result1))
					{
						echo $row['cnt'];
					}
				}
				else {
					echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
				}

				echo '</b><br><a href="course.php">Courses to complete</a></h2>

    </div>

</div>

<div class="middlecolumnm">
    <div class="cardm">
<i class="far fa-clock" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: black;"></i>
      <h2 style="color: black;"><b style="font-size:25px;">';


			$date=date('y-m-d');
			//echo $date;

			$sql2 = "SELECT count(COURSE_ID) as cnt FROM course_status where USER_ID = ? and END_DATE < ? ";

			mysqli_error($conn);
			if($stmt2 = mysqli_prepare($conn, $sql2))
				mysqli_stmt_bind_param($stmt2, "ss",$login_session,$date);

			if(mysqli_stmt_execute($stmt2))
			{
				$result2 = mysqli_stmt_get_result($stmt2);
				while($row = mysqli_fetch_assoc($result2))
				{
					echo $row['cnt'];
				}
			}
			else {
				echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			}



		echo '	</b><br><a href="course.php">Overdue courses</a></h2>

    </div>
  </div>

<div class="rightcolumnm">
    <div class="cardm">
<i class="far fa-window-maximize" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: black;"></i>
      <h2 style="color: black;"><b style="font-size:25px;">';

			$sql3 = "SELECT count(COURSE_ID) as cnt FROM course_status where USER_ID = ? and STATUS='completed'";
			mysqli_error($conn);
			if($stmt3 = mysqli_prepare($conn, $sql3))
				mysqli_stmt_bind_param($stmt3, "s",$login_session);

			if(mysqli_stmt_execute($stmt3))
			{
				$result3 = mysqli_stmt_get_result($stmt3);
				while($row = mysqli_fetch_assoc($result3))
				{
					echo $row['cnt'];
				}
			}
			else {
				echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
			}

echo' 	</b><br><a href="course.php">Completed courses</a></h2>

    </div>
</div>
  </div>
  <div>
<div class="row1">
<div class="leftcolumn1">


    <div class="card1">

<i class="fas fa-award" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: black;"></i>
<i class="fas fa-award" style="float:left;width:40px;height:80px;margin:30px 20px 20px 0px;font-size:36px; color: black;"></i>
<i class="fas fa-award" style="float:left;width:40px;height:40px;margin:30px 20px 20px 0px;font-size:36px; color: black;"></i>
<h2 style="color: black;"><b style="font-size:20px;">BADGES(2)</b><br>Your latest achievements</h2>
      <input class="buttonm" type="button" value="VIEW ALL"onclick="alert(\'Do you want to view all badges\')">
</div>

    </div>
<div class="middlecolumn1">
<div class="card1">
<i class="far fa-window-restore" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: black;"></i>
<i class="far fa-window-restore" style="float:left;width:40px;height:80px;margin:30px 20px 20px 0px;font-size:36px; color: black;"></i>
<i class="far fa-window-restore" style="float:left;width:40px;height:40px;margin:30px 20px 20px 0px;font-size:36px; color: black;"></i>
<h2 style="color: black;"><b style="font-size:20px; color: black;">Certificates(5)</b><br>Your latest achievements</h2>
      <input class="buttonm" type="button" value="VIEW ALL"onclick="alert(\'Do you want to view all certificates\')">

    </div>
   </div>
  </div>
</div>
</div>

<div id="Content" class="tabcontent">


</div>

<div id="Achievement" class="tabcontent">


</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<div class="tab">
<button class="tablink1" onclick="openPage(\'Course\', this, \'#003399\')" id="defaultOpen1" style="float: left">Courses</button>
<button class="tablink1" onclick="openPage(\'Quiz\', this, \'#003399\')">Quizzes</button>
</div>


<div id="Course" class="tabcontent1">
  <div id="courses">';

	$sql4 = "SELECT COURSE_ID,PROGRESS FROM course_status where USER_ID = ? LIMIT 1 ";
	mysqli_error($conn);
	if($stmt4 = mysqli_prepare($conn, $sql4))
		mysqli_stmt_bind_param($stmt4, "s",$login_session);

	if(mysqli_stmt_execute($stmt4))	{
		$result4 = mysqli_stmt_get_result($stmt4);
		while($row = mysqli_fetch_assoc($result4))
		{
			$course_id=$row['COURSE_ID'];

			$sql5 = "SELECT COURSE_NAME FROM courses where COURSE_ID = ? ";
			mysqli_error($conn);
			if($stmt5 = mysqli_prepare($conn, $sql5))
				mysqli_stmt_bind_param($stmt5, "s",$course_id);

			if(mysqli_stmt_execute($stmt5))
			{
				$result5 = mysqli_stmt_get_result($stmt5);
				while($row1 = mysqli_fetch_assoc($result5))
				{
					echo '

         <h3 class="course" style="color: black;"> <img src="https://assets.entrepreneur.com/content/3x2/2000/20141031174145-15-free-online-learning-sites.jpeg" width="8%">  ' .  $row1['COURSE_NAME'].'</h3>
             <p style="color: black;">Progress in this course ('.$row['PROGRESS'].'%)
      <progress value='.$row['PROGRESS'].' max="100"></progress></p><input class="buttonm" type="button" value="Resume"onclick="alert(\'Do you want to open this course\')">

			<div class="border"></div>
	    <div id="dots"></div>


';
			 }
		 }

	 }
 }
 else {
	 echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
 }

 echo'	<div id="more" style="display: none;"><div class="border"></div>';
 	$sql4 = "SELECT COURSE_ID,PROGRESS FROM course_status where USER_ID = ? LIMIT 1,9999999 ";
 	mysqli_error($conn);
 	if($stmt4 = mysqli_prepare($conn, $sql4))
 		mysqli_stmt_bind_param($stmt4, "s",$login_session);

 	if(mysqli_stmt_execute($stmt4))
 	{
 		$result4 = mysqli_stmt_get_result($stmt4);
 		while($row = mysqli_fetch_assoc($result4))
 		{
 			$course_id=$row['COURSE_ID'];

 			$sql5 = "SELECT COURSE_NAME FROM courses where COURSE_ID = ? ";
 			mysqli_error($conn);
 			if($stmt5 = mysqli_prepare($conn, $sql5))
 				mysqli_stmt_bind_param($stmt5, "s",$course_id);

 			if(mysqli_stmt_execute($stmt5))
 			{
 				$result5 = mysqli_stmt_get_result($stmt5);
 				while($row1 = mysqli_fetch_assoc($result5))
 				{
 					echo '

          <h3 class="course" style="color: black;"> <img src="https://assets.entrepreneur.com/content/3x2/2000/20141031174145-15-free-online-learning-sites.jpeg" width="8%">  ' .  $row1['COURSE_NAME'].'</h3>
              <p style="color: black;">Progress in this course ('.$row['PROGRESS'].'%)
       <progress value='.$row['PROGRESS'].' max="100"></progress></p><input class="buttonm" type="button" value="Resume"onclick="alert(\'Do you want to open this course\')">

          <div class="border"></div>';
 			 }
 		 }

 	 }
  }
  else {
 	 echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
  }


  echo'</div>
    <button onclick="myFunction()" id="myBtn">VIEW ALL</button>
  </div>


<div id="Quiz" class="tabcontent1">

</div>


<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent1, tablinks1;
  tabcontent1= document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent1.length; i++) {
    tabcontent1[i].style.display = "none";
  }
  tablinks1 = document.getElementsByClassName("tablink1");
  for (i = 0; i < tablinks1.length; i++) {
    tablinks1[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen1").click();
</script>


';



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
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "VIEW ALL";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "VIEW LESS";
    moreText.style.display = "inline";
  }
}
</script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script>
      /* code by webdevtrick ( https://webdevtrick.com ) */
$(function() {
  $("#bars li .bar").each( function( key, bar ) {
    var percentage = $(this).data('percentage');

    $(this).animate({
      'height' : percentage + '%'
    }, 1000);
  });
});
    </script>




</body>
</html>
