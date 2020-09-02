
<?php

include 'db_config.php';
session_start();

	$login_session = $_SESSION['login_user'];

echo '
<!DOCTYPE html>
<html>
<head>
<title>Messages</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <!-- startbootstrap.com -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled javascript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>



      .a{
        background: #4169e1;
        color: white;
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
  body {
        background-color: #e6e6e6;
			}
			.container-fluid {
			  background-color: #4169e1;
			  padding: 5px 20px ;
			}
			/* Style the list */
			ul.breadcrumb {
			  background-color: #4169e1;
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
			.course {
				position: relative;
			}
      .leftcolumn {
			  margin-left: 20px;
			  padding-top: 20px;
			  float: left;
			  position: absolute;
			}
			.item {
			  float: left;
			}
			.contents {
			  display: inline-block;
			  width: 730px;
			  position: absolute;
			  right: 40px;
			  height: 100px;
			}

			/* Pagination */
			.pagination {
			  padding: 30px 0px;
			  clear: both;
			}
			/* Button */
			.buttonm {
			  background-color: #115ffa;
			  border: none;
			  color: white;
			  padding: 5px 10px;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 18px;
			  cursor: pointer;
			  border-radius:4px;
			}
			.buttonm:hover {
			  background-color:#2d862d;
			  color: white;
			}

			/* Module */
			.module {
			  float: left;
			  position: relative;
			  clear: both;
			  padding: 400px 20px;
			}
			.icon {
			  float: left;
			 /* position: relative;*/
			  padding: 2px 0px;
			  word-spacing: 4px;
			}




</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top  w3-small" style="z-index:4; background-color: #4169e1;">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();" style="float:left;color: white;"><i class="fa fa-bars" style="color: white;"></i>  Menu</button>
  <span class="w3-bar-item w3-animate-left" style="float: right;"><img src="sbfc.png" width="70%"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4"> ';

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
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding " ><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
  <!--  <h4 style="font-size: 17px;"><a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart"></i>  Analytics(course-wise)</a></h4> -->
    <h4 style="font-size: 17px;"><a href="course.php" class="w3-bar-item w3-button w3-padding" style="background-color: #4169e1; color: white;"><i class="fa fa-graduation-cap"></i>  Courses</a></h4>
    <h4 style="font-size: 17px;"><a href="account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Account</a></h4>

   <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments"></i>  Messages</a></h4>
   <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a></h4>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:35px;">


  <!-- Header -->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li style="font-size:25px;"><a href="#">Courses</a></li>
    </ul>
  </div>
  <div class="course">
    <div class="leftcolumn">
      <img src="https://blog.commlabindia.com/wp-content/uploads/2018/01/blend-product-training-with-microlearning.jpg" width="250px" height="150px">
    </div>
    <div class="contents">
      <div class="item">
      ';


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
             echo '<h2>'.$row['COURSE_NAME'].'</h2>  <p>'.$row['DESCRIPTION'].'</p>';
          }
        }

        echo '<div class="pagination">
          <a href="#" class="buttonm">Start Course</a>
        </div>

      </div>
    </div><br>
    <div class="module">
      <div class="icon">
        <p><h4><span class="glyphicon glyphicon-list" style="font-size:20px; color:black;"></span> Modules</h4></p>
      </div><br><br><br>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ex1">Heading 1</a>
              </h4>
            </div>
            <div id="ex1" class="panel-collapse collapse in">
              <div class="panel-body"> sub Content</div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ex2" href="#ex3">Heading 2</a>
              </h4>
            </div>
            <div id="ex2" class="panel-collapse collapse in">
              <div class="panel-body">Content 1</div>
            </div>
            <div id="ex3" class="panel-collapse collapse in">
              <div class="panel-body">Content 2</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>';


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

    <script>
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




</body>
</html>
