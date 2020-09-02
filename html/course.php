<?php

include 'db_config.php';
session_start();

	$login_session = $_SESSION['login_user'];

echo '
<!DOCTYPE html>
<html>
<head>
  <title>Course</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
	body
    {
      font-family: "sans-serif";
      background-color:  #e6e6e6;
			overflow: hidden;
    }

	.active {
	  background-color:white;
	  border-bottom: 5px solid #e6b800;
	}


	/* Float four columns side by side */
	.column {
	  float: left;
	  padding: 15px 20px;
	}

	/* Responsive columns */
	@media screen and (max-width: 800px) {
	.column {
		display: inline;
		margin-bottom: 20px;
    margin-right:20px;
	  }
	}

	/* Style the counter cards */
	.card {
		width:200px;
	  background-color: white;
	  font-size: 18px;
		margin: 10px;
	}
	/* Button */
	.buttonm {
	  background-color: #4169e1;
	  border: none;
	  color: white;
	  padding: 3px 10px;
    width:100%;
    text-align:center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 18px;
	  cursor: pointer;
	  border-radius:4px;
	}
	.buttonm:hover {
	  background-color:#7b97ea;
	}

	/* Right Column */

  .row{
    width:80%;
  }
	.rightcolumn {

	  float: right;
	  font-size: 18px;
    width:20%;
    margin-right:30px;
	}

  .tabcontent {
    display: none;
    weight:70%;
  }

  .tab {
    overflow: hidden;
    padding:20px 20px;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 15px;
    color: black;
    width:15%;
    border-bottom: 5px solid #a6a6a6;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: white;
    color: black;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: white;
    border-bottom: 5px solid #4169e1;
  }

  /* Style the tab content */
  .tabcontent {
    padding:0 10px;
    display: none;
    border-top: none;
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
      <!--  <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart"></i>  Analytics(course-wise)</a></h4> -->
        <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding"  style="background-color: #4169e1; color: white;"><i class="fa fa-graduation-cap"></i>  Courses</a></h4>
        <h4 style="font-size: 17px;"><a href="account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Account</a></h4>

       <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments"></i>  Messages</a></h4>
       <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a></h4>

      </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">


  <div class="tab">
  <button class="tablinks" onclick="openCity(event, \'All\')" id="defaultOpen">All</button>
  <button class="tablinks" onclick="openCity(event, \'Progress\')">Progress</button>
  <button class="tablinks" onclick="openCity(event, \'Overdue\')">Overdue</button>
	<button class="tablinks" onclick="openCity(event, \'Completed\')">Completed</button>
  </div>

<div id="All" class="tabcontent">

  <div class="rightcolumn">

      <p>Announcements</p>
    <div class="card">
      <img src="https://blog.commlabindia.com/wp-content/uploads/2018/01/blend-product-training-with-microlearning.jpg" width="200px" height="150px">
      <p>New Video Material<br>  Duration - 5 Mins</p>
      <a href="#" class="buttonm">Watch Video</a>
    </div>
      <p>Recent Achievements<br></p>
      <p>You have no achievements yet</p>

  </div>

	<div class="row">

	';

					$sql = "SELECT * FROM course_status where USER_ID = ?";

			     $stmt = mysqli_prepare($conn, $sql);
			     mysqli_stmt_bind_param($stmt, 's', $login_session);


			     if(mysqli_stmt_execute($stmt))
			     {
			       $result = mysqli_stmt_get_result($stmt);
			       while($row = mysqli_fetch_assoc($result))
			       {
			         $course_status=$row['STATUS'];
			         $course_id=$row['COURSE_ID'];

			         $sql1 = "SELECT * FROM courses where COURSE_ID = ?";

			          $stmt1 = mysqli_prepare($conn, $sql1);
			          mysqli_stmt_bind_param($stmt1, 's', $course_id);


			          if(mysqli_stmt_execute($stmt1))
			          {
			            $result1 = mysqli_stmt_get_result($stmt1);
			            while($row = mysqli_fetch_assoc($result1))
			            {
			              echo '<div class="column">	<div class="card">
											<img src="'.$row['COURSE_IMG'].'" width="200px" height="150px">
									  <p> ' . $row['COURSE_NAME'].'<br> Duration - '. $row['COURSE_DURATION'].' Mins</p>
								  <a href="courses.php?link='.$row['COURSE_ID'].'" class="buttonm">Start Course</a>
									</div></div>';
			            }
			          }
			       }
			     }



echo'
	</div>
  </div>



  <div id="Progress" class="tabcontent">

    <div class="rightcolumn">
      <p>Announcements</p>
      <div class="card">
        <img src="https://blog.commlabindia.com/wp-content/uploads/2018/01/blend-product-training-with-microlearning.jpg" width="200px" height="150px">
        <p>New Video Material<br>
        Duration - 5 Mins</p>

        <a href="#" class="buttonm">Watch Video</a>
      </div>
      <div class="item">
        <p>Recent Achievements<br></p>
        <p>You have no achievements yet</p>
      </div>
    </div>


		<div class="row">';

			$sql = "SELECT * FROM course_status where USER_ID = ? and STATUS='resume'";

			 $stmt = mysqli_prepare($conn, $sql);
			 mysqli_stmt_bind_param($stmt, 's', $login_session);


			 if(mysqli_stmt_execute($stmt))
			 {
				 $result = mysqli_stmt_get_result($stmt);
				 while($row = mysqli_fetch_assoc($result))
				 {
					 $course_status=$row['STATUS'];
					 $course_id=$row['COURSE_ID'];

					 $sql1 = "SELECT * FROM courses where COURSE_ID = ?";

						$stmt1 = mysqli_prepare($conn, $sql1);
						mysqli_stmt_bind_param($stmt1, 's', $course_id);


						if(mysqli_stmt_execute($stmt1))
						{
							$result1 = mysqli_stmt_get_result($stmt1);
							while($row = mysqli_fetch_assoc($result1))
							{
								echo '<div class="column">	<div class="card">
									<img src="'.$row['COURSE_IMG'].'" width="200px" height="150px">
								<p> ' . $row['COURSE_NAME'].'<br> Duration - '. $row['COURSE_DURATION'].' Mins</p>
							<a href="#" class="buttonm">Start Course</a>
							</div></div>';
							}
						}
				 }
			 }
echo'

		</div>

  </div>




  <div id="Overdue" class="tabcontent">

    <div class="rightcolumn">
      <p>Announcements</p>
      <div class="card">
        <img src="https://blog.commlabindia.com/wp-content/uploads/2018/01/blend-product-training-with-microlearning.jpg" width="200px" height="150px">
        <p>New Video Material<br>
        Duration - 5 Mins</p>
        <a href="#" class="buttonm">Watch Video</a>
      </div>
        <p>Recent Achievements<br></p>
        <p>You have no achievements yet</p>
    </div>

		<div class="row">

		';

		$date=date('y-m-d');
		//echo $date;

		$sql = "SELECT * FROM course_status where USER_ID = ? and END_DATE < ? ";

		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "ss", $login_session, $date);

	  mysqli_error($conn);


		if(mysqli_stmt_execute($stmt))
		{
			$result = mysqli_stmt_get_result($stmt);
			while($row = mysqli_fetch_assoc($result))
			{
				$course_status=$row['STATUS'];
				$course_id=$row['COURSE_ID'];

				$sql1 = "SELECT * FROM courses where COURSE_ID = ?";
				$stmt1 = mysqli_prepare($conn, $sql1);
				mysqli_stmt_bind_param($stmt1, 's', $course_id);


				if(mysqli_stmt_execute($stmt1))
				{
					$result1 = mysqli_stmt_get_result($stmt1);
					while($row = mysqli_fetch_assoc($result1))
					{
						echo '<div class="column">	<div class="card">
							<img src="'.$row['COURSE_IMG'].'" width="200px" height="150px">
						<p> ' . $row['COURSE_NAME'].'<br> Duration - '. $row['COURSE_DURATION'].' Mins</p>
					<a href="#" class="buttonm">Start Course</a>
					</div></div>';
					}
				}
		 }
	 }

		echo'
		</div>
</div>

		<div id="Completed" class="tabcontent">

			<div class="rightcolumn">
				<p>Announcements</p>
				<div class="card">
					<img src="https://blog.commlabindia.com/wp-content/uploads/2018/01/blend-product-training-with-microlearning.jpg" width="200px" height="150px">
					<p>New Video Material<br>
					Duration - 5 Mins</p>

					<a href="#" class="buttonm">Watch Video</a>
				</div>
				<div class="item">
					<p>Recent Achievements<br></p>
					<p>You have no achievements yet</p>
				</div>
			</div>


			<div class="row">';

				$sql = "SELECT * FROM course_status where USER_ID = ? and STATUS='completed'";

				 $stmt = mysqli_prepare($conn, $sql);
				 mysqli_stmt_bind_param($stmt, 's', $login_session);


				 if(mysqli_stmt_execute($stmt))
				 {
					 $result = mysqli_stmt_get_result($stmt);
					 while($row = mysqli_fetch_assoc($result))
					 {
						 $course_status=$row['STATUS'];
						 $course_id=$row['COURSE_ID'];

						 $sql1 = "SELECT * FROM courses where COURSE_ID = ?";

							$stmt1 = mysqli_prepare($conn, $sql1);
							mysqli_stmt_bind_param($stmt1, 's', $course_id);


							if(mysqli_stmt_execute($stmt1))
							{
								$result1 = mysqli_stmt_get_result($stmt1);
								while($row = mysqli_fetch_assoc($result1))
								{
									echo '<div class="column">	<div class="card">
										<img src="'.$row['COURSE_IMG'].'" width="200px" height="150px">
									<p> ' . $row['COURSE_NAME'].'<br> Duration - '. $row['COURSE_DURATION'].' Mins</p>
								<a href="#" class="buttonm">Start Course</a>
								</div></div>';
								}
							}
					 }
				 }
	echo'

			</div>


		</div>
		';

		?>


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




</div>

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
  </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>







</body>
</html>
