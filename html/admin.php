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
<title>Admin Dashboard</title>

<meta charset="UTF-8">


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


body {
  font-family:  Arial, Helvetica, sans-serif;
  padding: 0px;
  background: #FFFFFF;
overflow: hidden;

}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .middlecolumn {
    width: 50%;
    padding: 0;
  }
}


.topnavx {
  overflow: hidden;
  background-color:  #1d3056;
width:100%;

}

.topnavx a {
  float: left;
  color:#FFFFFF;
  text-align: center;
  font-size: 17px;
  text-decoration:none;
   font-size:20px;
   padding-top:15px;
   padding-bottom:10px;
padding-left:10px;

}

.topnavx a:hover {
  background-color:;
   text-decoration:underline;
  color: white;
}

.topnavx a.active {
padding-top:8px;
  font-size:180%;
  color: white;
}


.leftcolumnm {
  float: left;
  margin-left: 10px;
width: 45%;
  background-color: ;
  padding-left: 20px;
}

.middlecolumnm {
  float: left;
  margin-left: 10px;
width: 45%;
  padding-left: 20px;
}

/* Clear floats after the columns */
.rowm:after {
  content: "";
  display: table;
  clear: both;
}
.cardm {
  background-color: white;
  padding: 0px;
  margin-top: 20px;
  border: solid 2px #d9d9d9;
  border-radius: 6px;

}

h2{font-size:20px;}
a{text-decoration:none;}

a{color: #1d3056;}

a:hover {
   text-decoration:none;
  color: #90774f;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumnm, .middlecolumnm {
    width: 95%;
padding-left: 2px;

  }
}



</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-small" style="z-index:4;background-color: #1d3056">
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
    <h4 style="font-size: 17px;background-color: #1d3056;color: #FFFFFF;"><a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
    <h4 style="font-size: 17px;"><a href="admin-account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Account</a></h4>
   <h4 style="font-size: 17px;"><a href="report.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pie-chart"></i>  Analytics</a></h4>
   <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments"></i>  Messages</a></h4>
   <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a></h4>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="topnavx" style="margin-top: 5%">
  <a  class="active" href="#" style="text-decoration: none;">Home</a>
</div>


<div class="rowm">

  <div class="leftcolumnm">
    <div class="cardm">
<i class="fas fa-user-tie" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: #1d3056;"></i>
      <h2 style="color: #90774f;"><a href="displayuser.php" style=" text-decoration: none;"><b style="color: #90774f; font-size:20px;">USERS</b></a><br><a href="adduser.php">Add User</a></h2>

    </div>

</div>

<div class="middlecolumnm">
    <div class="cardm">
<i class="fas fa-book" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: #1d3056;"></i>
    <h2 style="color: #90774f;"><a href="Display_course.php" style=" text-decoration: none;"><b style="color: #90774f; font-size:20px;">COURSES</b></a><br><a href="addcourse.php">Add Course</a> </h2>

    </div>
  </div></div>

<div class="rowm">

  <div class="leftcolumnm">
    <div class="cardm" style="margin-top:0px;">
<i class="fas fa-users" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: #1d3056;"></i>
      <h2><a href="group.php" style="color: #90774f;"><b style="font-size:20px;">GROUPS</b></a><br><a href="add_group.php">Add Group</a></h2>

    </div>

</div>

<div class="middlecolumnm">
    <div class="cardm" style="margin-top:0px;">
<i class="fas fa-chart-pie" style="float:left;width:40px;height:80px;margin:30px 20px 20px 20px;font-size:36px; color: #1d3056;"></i>
      <h2><a href="report.php" style="text-decoration: none; color: #90774f;"><b style="font-size:20px;">REPORTS</b></a><br><a href="user_chart.php" style="text-decoration: none;">Users </a> <a href="">&middot;</a><a href="course_chart.php" style="text-decoration: none;"> Courses</a></h2>

    </div>
  </div>

<!--page content end-->

';
?>

<script src="Profile script.js"></script>
<script>
    var fgImage=null;
    var canvas1=null;

    function loadforegroundimage()
    {
        canvas1=document.getElementById("can1");
        var fgfile=document.getElementById("fginput");
        fgImage=new SimpleImage(fgfile);
        fgImage.drawTo(canvas1);
    }

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




</body>
</html>
