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
<title>Reports</title>

<meta charset="UTF-8">


<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
    <h4 style="font-size: 17px;"><a href="admin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
    <h4 style="font-size: 17px;"><a href="admin-account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Account</a></h4>
   <h4 style="font-size: 17px;background-color: #1d3056;color: #FFFFFF;"><a href="report.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pie-chart"></i>  Analytics</a></h4>
   <h4 style="font-size: 17px;"> <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments"></i>  Messages</a></h4>
   <h4 style="font-size: 17px;"> <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Logout</a></h4>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="topnavx" style="margin-top: 5%">
  <a  class="active" href="#" style="text-decoration: none;">Reports</a>
</div>
</div>
';
echo '
<div id="chart" class="cht" style= "width: 73%; margin-top: 3%"></div>
<style>
				.cht{
					height:350px;
					width:1000px;
					margin-left:320px;
					margin-right:400px;
				
					background:white;
					-webkit-box-shadow: 7px 15px 104px -20px rgba(0,0,0,0.75);
					-moz-box-shadow: 7px 15px 104px -20px rgba(0,0,0,0.75);
					box-shadow: 7px 15px 104px -20px rgba(0,0,0,0.75);
				}
				</style>
				<br><br><br><br><br><br><br><br>
';

//cod for retrieving chart data
$r0 = "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
$r1= "SELECT LOGINTIME, COUNT(USER_ID) FROM user_log WHERE DATE(LOGINTIME)>= CURDATE() - INTERVAL 7 DAY  GROUP BY DATE(LOGINTIME);";
$r2 = "SELECT COUNT(USER_ID) FROM user_log WHERE DATE(LOGINTIME)=CURDATE()";
$r3 = "DELETE FROM user_log WHERE LOGINTIME < CURDATE() - INTERVAL 8 DAY";
$res1=mysqli_query($conn,$r0);
$res1=mysqli_query($conn,$r1);
$res2=mysqli_query($conn,$r2);
$res3=mysqli_query($conn,$r3);
$row2=mysqli_fetch_array($res2);
$chart_data='';

while($row=mysqli_fetch_array($res1))
{
    $time= strtotime($row['LOGINTIME']);
    $ct=$row['COUNT(USER_ID)'];
    $chart_data .="{ date:'".date('d-m-Y',$time)."', user:'".$ct."'},";
}
?>

<script>
    new Morris.Line({

        element: 'chart',
        data: [<?php echo $chart_data;?>],
        xkey: ['date'],
        ykeys: ['user'],
        labels: ['Users',],
        lineColors: ['#90774f'],
        pointFillColors: ['#1d3056'],
        gridTextColor: ['#1d3056'],
        gridTextWeight: ['bold'],
        resize: true,
        parseTime: false

    });
</script>
</body>
</html>