<?php

include 'db_config.php';

session_start();

	//$course_id = $_SESSION['course_info'];


echo'
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- startbootstrap.com -->
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Latest compiled javascript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<style>
			.container-fluid {
         background-color: #4CAF50;
			  padding: 5px 20px ;
			}
			/* Style the list */
			ul.breadcrumb {
			  background-color: #4CAF50;
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
			  background-color: #4CAF50;
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

			.a{
				background: #30742C;
				color: white;
			}

			.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}


		</style>
	</head>

	<body>
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li><a href="admin.php">Home</a></li>
				<li style="font-size:25px;"><a href="#">Courses</a></li>
			</ul>
		</div>

		<div class="w3-container">';

		if (isset($_GET['link']))
		{
			$course_id=$_GET['link'];
		}


		$sql = "SELECT * FROM courses where COURSE_ID = ?";

		$stmt1 = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt1, 's', $course_id);


		if(mysqli_stmt_execute($stmt1))
		{
			$result1 = mysqli_stmt_get_result($stmt1);
			while($row = mysqli_fetch_assoc($result1))
			{
					echo '<img src ="'.$row["COURSE_IMG"].'" width="200px" height="150px"> <span> '.$row["COURSE_NAME"].'<br>'.$row["DESCRIPTION"] .'</span>
					<div class="dropdown">  <button class="dropbtn"> Add Module </button>  <div class="dropdown-content">
				   <button onclick="document.getElementById(\'id01\').style.display=\'block\'">Module</button>
					 <button onclick="document.getElementById(\'id02\').style.display=\'block\'">Video</button>  </div>
				  </div>';

			 }
		 }

		 if($_SERVER["REQUEST_METHOD"] == "POST")
		 {

			 if(isset($_POST["Module"]))
			 {
				 $module=$_POST["Module"];
				 $module_id=10001;

			 	$sql1 = "SELECT * FROM module WHERE MODULE_ID=(SELECT max(MODULE_ID) FROM module where COURSE_ID= ? ) ";

				if($stmt1 = mysqli_prepare($conn, $sql1))
					mysqli_stmt_bind_param($stmt1, "s",$course_id);

					if(mysqli_stmt_execute($stmt1))
					{
						$result1 = mysqli_stmt_get_result($stmt1);
						while($row = mysqli_fetch_assoc($result1))
						{
								 $module_id = $row['MODULE_ID']+1;
						}
				  }


							$sql = "INSERT INTO module (COURSE_ID,MODULE_NAME,MODULE_ID) VALUES (?, ?, ?)";
							mysqli_error($conn);

							if($stmt = mysqli_prepare($conn, $sql))
								mysqli_stmt_bind_param($stmt, "ssd",$course_id,$module,$module_id);

						 if(mysqli_stmt_execute($stmt))
							{
								mysqli_stmt_store_result($stmt);
						 // echo "New record created successfully";
							}
						 else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}

						}

						 if(isset($_POST["video"])){

							 $module="INTRO";
							 $module_id=10000;

							 $sql1 = "SELECT * FROM module WHERE MODULE_ID=(SELECT max(MODULE_ID) FROM module where COURSE_ID=?) ";

							 if($stmt1 = mysqli_prepare($conn, $sql1))
 								mysqli_stmt_bind_param($stmt1, "s",$course_id);

 								if(mysqli_stmt_execute($stmt1))
 								{
 									$result1 = mysqli_stmt_get_result($stmt1);
 									while($row = mysqli_fetch_assoc($result1))
 									{
			 								 $module = $row['MODULE_NAME'];
											 $module_id=$row['MODULE_ID'];
			 						}
			 					}



							 $maxsize = 99999999999515242880; // 5MB

              $video = $_FILES['vid']['name'];
              $target_dir = "assets/video/";
						  $target_file = $target_dir . $_FILES["vid"]["name"];

              $query = "INSERT INTO module(VIDEO_NAME,VIDEO_LOCATION,COURSE_ID,MODULE_NAME,MODULE_ID) VALUES('".$_POST["video"]."','".$target_file."', ?, ?, ?)";

							if($stmt = mysqli_prepare($conn, $query))
								mysqli_stmt_bind_param($stmt, "ssd",$course_id,$module,$module_id);

						 if(mysqli_stmt_execute($stmt))
							{
								mysqli_stmt_store_result($stmt);
						    //echo "Upload success";
							}
						 else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}

						 }

					}






 echo'

 <div id="id01" class="w3-modal">
	 <div class="w3-modal-content">
		 <header class="w3-container w3-teal">
			 <span onclick="document.getElementById(\'id01\').style.display=\'none\'"
			 class="w3-button w3-display-topright">&times;</span>
			 <h2>Add Module</h2>
		 </header>
		 <div class="w3-container">
		 <form method="post">
		 <label for="fname">Module Name</label>
		 <input type="text" id="Module" name="Module" placeholder="Module name..">
		 <input type="submit" value="Submit">
		 </form>
		 </div>
	 </div>
 </div>

 <div id="id02" class="w3-modal">
	<div class="w3-modal-content">
		<header class="w3-container w3-teal">
			<span onclick="document.getElementById(\'id02\').style.display=\'none\'"
			class="w3-button w3-display-topright">&times;</span>
			<h2>Add Video</h2>
		</header>

		<div class="w3-container">
		<form method="post" enctype=\'multipart/form-data\'>

		<label for="video">Unit Name</label>
		<input type="text" id="video" name="video" placeholder="Unit name..">
		<label for="vid">Select video:</label>
    <input type="file" id="vid" name="vid" accept="video/*">

		<input type="submit" value="Submit">
		</form>
		</div>
	</div>
 </div>

 <div>';


 $sql1 = "SELECT * FROM module WHERE  COURSE_ID= ?  ";

 if($stmt1 = mysqli_prepare($conn, $sql1))
	 mysqli_stmt_bind_param($stmt1, "s",$course_id);

	 if(mysqli_stmt_execute($stmt1))
	 {
		 $result1 = mysqli_stmt_get_result($stmt1);
		 while($row = mysqli_fetch_assoc($result1))
		 {
					if(empty($row['VIDEO_NAME'])){
						echo '<span><h3>'.$row['MODULE_NAME'].'</h3></span>';
					}
					else {
						echo'<span><h6>'.$row['VIDEO_NAME'].'</h6></span>';
						echo'<video width="320" height="240" controls>
					   <source src="'.$row['VIDEO_LOCATION'].'" type="video/mp4">
					   <source src="movie.ogg" type="video/ogg">
					   Your browser does not support the video tag.
					 </video>';
					}
		 }
	 }


echo'

</div>

</div>

</body>

</html>';
?>
