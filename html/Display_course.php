<?php

include 'db_config.php';
session_start();

	$login_session = $_SESSION['login_user'];


echo'
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Courses</title>

		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- startbootstrap.com -->
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Latest compiled javascript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<style>

			/* Style the list */
			ul.breadcrumb {
				overflow:hidden;
				width:100%;
			  background-color: #1d3056;
			  margin-top: 5%;
			}
			/* Display list items side by side */
			ul.breadcrumb li {
			  display: inline;
			  font-size: 18px;
			}
			/* Add a slash symbol (/) before/behind each list item */
			ul.breadcrumb li+li:before {
			  padding: 5px;
			  color: white;
			  content: "/\00a0";
			}
			/* Add a color to all links inside the list */
			ul.breadcrumb li a {
			  color: white;
			  text-decoration: none;
			}

			/* Add user button */
			.dropdowna {
			  padding: 15px 20px;

			}

			/* Glyphicon */
			.btn-group {
			  float: right;
			  position: relative;
			}
			.info {
			  padding: 20px 20px;
			}
			.headings {
			  background-color: #1d3056;
			  color: white;
			}

			/* Pagination */
			.pagination {
			  padding: 20px 20px;
			}
			.previous.disabled .page-link {
			  color: white;
			  background-color: #a6a6a6;
			  pointer-events: none;
			}
			.icon {
			  float: right;
			  position: relative;
			  padding: 50px 25px;
			  word-spacing: 15px;

			}

			.dropbtn {
			  background-color: #1d3056;
			  color: white;
			  padding: px;
			  font-size: 0px;
			  border: none;
			}

			.dropdown {
			  position: relative;
			  display: inline-block;
			}

			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #f1f1f1;
			  min-width: 160px;
			  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}

			.dropdown-content a {
			  color: black;
			  padding: 12px 16px;
			  text-decoration: none;
			  display: block;
			}

			.dropdown-content a:hover {background-color: #ddd;}

			.dropdown:hover .dropdown-content {display: block;}

			.dropdown:hover .dropbtn {background-color:#90774f;}

			.a{
				background: #90774f;
				color: #ffffff;
			}

		</style>
	</head>

	<body class="w3-light-grey">

	<!-- Top container -->
	<div class="w3-bar w3-top w3-small" style="z-index:4;background-color:#1d3056;">
	  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();" style="float:left;"><i class="fa fa-bars"></i>  Menu</button>
	  <span class="w3-bar-item w3-animate-left" style="float: right;"><img src="sbfc.png"width=40%></span>
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


echo'</strong></span><br></h4>

	    </div>
	  </div>
	  <hr>

	  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <h4 style="font-size: 17px;background-color: #1d3056;color: #FFFFFF;"><a href="admin.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;"><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
    <h4 style="font-size: 17px;"><a href="admin-account.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;"><i class="fa fa-user fa-fw"></i>  Account</a></h4>
   <h4 style="font-size: 17px;"><a href="report.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;"><i class="fa fa-pie-chart"></i>  Analytics</a></h4>
   <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;"><i class="fa fa-comments"></i>  Messages</a></h4>
   <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;"><i class="fa fa-sign-out"></i>  Logout</a></h4>

  </div>
	</nav>


	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->

	<div class="w3-main" style="margin-left:300px;margin-top:43px;">

			<ul class="breadcrumb">
				<li><a href="admin.php">Home</a></li>
				<li style="font-size:25px;"><a href="#">Courses</a></li>
			</ul>


		<div class="dropdowna">
		<a href="addcourse.php" class="btn a" role="button">Add Course</a>
		<div class="btn-group">
			<button type="button" class="btn btn-default active">
				<span class="glyphicon glyphicon-th"></span>
			</button>
			<button type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-th-list"></span>
			</button>
		</div>
		</div>

		<div class="info">
			<table class="table">
				<thead>
					<tr class="headings" style="font-size: 15px;">
						<th style="text-align: left">COURSES</th>
						<th style="text-align: center">CATEGORY</th>
						<th style="text-align: center">LAST UPDATED</th>
						<th style="text-align: center">OPTIONS</th>
					</tr>
				</thead>
				<tbody>';

          $sql = "SELECT * FROM courses";

          $result = mysqli_query($conn, $sql);

           if (mysqli_num_rows($result) > 0) {

			       while($row = mysqli_fetch_assoc($result))
			       {
			          echo '<tr><td style="text-align: left"><a href="content.php?link='.$row['COURSE_ID'].'"';
                echo' style="text-decoration:none; color:black;">'.$row['COURSE_NAME'].'</td>
                    <td style="text-align: center">Samples</td>
                    <td style="text-align: center">'.$row['UPDATE_DATE'].'</td>
                    <td style="text-align: center"><div class="dropdown">
                <button class="dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true" style="font-size: 16px;"></i></button>
                <div class="dropdown-content" style="text-align: left">
                 <a href="edit_course.php"><span style="font-size:20px;float: left"></span>Edit</a>
                 <a href="delete_course.php">Delete</a>
               </div>
             </div></td>
           </tr>       ';


			       }
			     }

              ?>

				</tbody>
			</table>
		</div>
		<div class="pagination">
			<ul class="pager">
				<li class="previous disabled"><a class="page-link" href="#">1 to 1 of 1</a></li>
			</ul>
		</div>
	</div>

	</body>

</html>
