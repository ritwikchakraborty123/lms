<?php

include 'db_config.php';
session_start();

$login_session = $_SESSION['login_user'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $firstname = strtoupper($_POST["fname"]);
    $lastname = strtoupper($_POST["lname"]);
    $user_id = $_POST["uid"];
    $email = strtolower($_POST["email"]);
    $DOJ = date("Y/m/d",time());
    $usertype = $_POST["usertype"];
    $status = strtoupper($_POST["status"]);
    $profile_img = "";
    $department = strtolower($_POST["department"]);
    $role = strtolower($_POST["role"]);
    $ipassword = $_POST["password"];
    $hash = password_hash($ipassword, PASSWORD_DEFAULT);
    $languagechoosen = strtoupper($_POST["language"]);
    $timezonselected = "KOLKATA";
    $registrationtime = date("Y/m/d",time());
    $sql1 = "INSERT INTO account(FIRSTNAME,LASTNAME,DOJ,USER_ID,PASSWORD,USER_TYPE,EMAIL,TIMEZONE,LANGUAGE,REGISTRATION,DEPARTMENT,ROLE,STATUS) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?)";
    mysqli_error($conn);
    if($stmt1 = mysqli_prepare($conn, $sql1))
        mysqli_stmt_bind_param($stmt1, "sssssssssssss",$firstname,$lastname,$DOJ,$user_id,$hash,$usertype,$email,$timezonselected,$languagechoosen,$registrationtime,$department,$role,$status);

    if(mysqli_stmt_execute($stmt1))
    {
        mysqli_stmt_store_result($stmt1);
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}
if (isset($_POST['cancel_please']))
{
    ?>
    <script type="text/javascript">
        window.location = "group.php";
    </script>
    <?php
}

echo '
<!DOCTYPE html>
<html>
<head>
<title>Add Group</title>

<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  background: white;
overflow: hidden;

}
.topnavx {
    overflow: hidden;
    background-color: #1d3056;
    width:100%;
    margin-top: 5%;
    margin-bottom: 10px;
    padding:0 10px;

}

.topnavx a {
  float: left;
  color:white;
  text-align: center;
  font-size: 17px;
  text-decoration:none;
   font-size:20px;
   padding-top:15px;
   padding-bottom:10px;

}

.topnavx a:hover {

   text-decoration:none;
  color: white;
}

.topnavx a.active {
padding-top:8px;
  font-size:180%;
  color: white;
}


.box {
  float: right;
  width: 50%;
  padding-left: 150px;
margin-top:0%;
  height: 400px;
}

/* Left-column */
.left-column {
  float: left;
  width: 95%;
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
    width: 50%;
    padding: 0;
  }
}

@media screen and (max-width: 600px) {
  .col-25, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

#can1
{

  height:200px;
  width:200px;
margin-left:10%;
margin-bottom:5%;
  border:solid 1px;
  border-radius:0px;
  box-shadow: 0px 2px 4px 0px rgba(0,0,0,2.5);
}

.y{
margin-left:80px;
margin-top:20px;
}
.col-25 {
  float: left;
  width: 12%;
  margin-top: 6px;
margin-left: 50px;
}



input[type=text],input[type=email],input[type=password],select {
  width: 30%;
  padding: 12px 10px;
  margin: 4px 0px;
  display: inline-block;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size:15px;
}

textarea{
width:30%;
height:20%;
border:2px solid #ccc;
border-radius:4px;
margin-top:10px;
margin-bottom:10px;
}

.hide {
  display: none;
}

.myDIV:hover + .hide {
  display: block;
  color: #43BE31;
margin-left:10%;
}



</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-small" style="z-index:4; background-color: #1d3056">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();" style="float:left;"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-animate-left" style="float: right;"><img src="sbfc.png"width=40%></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4"> 
';

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


echo' </strong></span><br></h4>';



?>

</div>
</div>
<hr>

<div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <h4 style="font-size: 17px;background-color: #1d3056;color: #FFFFFF;"><a href="admin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pie-chart"></i>  Dashboard</a></h4>
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

    <div class="topnavx">
        <a href="admin.php"> Home</a>
        <a href="#">/</a>
        <a href="group.php"> Group</a>
        <a href="#">/</a>
        <a class="active" href="#"> Add Group</a>
    </div>
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js">
        <script src="Profile script.js"></script>
    <div class="row">
        <div class="left-column">

            <h1 style="color:#90774f; padding-left: 40px;">Add Group</h1></div></div>

    <!--<form action="" method="post">
        <div class="col-25">
            <label for="fname">First name:</label></div>

        <input type="text" id="fname" name="fname" placeholder="Aditya" autofocus required><br>
        <div class="col-25">
            <label for="lname">Last name:</label></div>
        <input type="text" id="lname" name="lname" placeholder="Bhardwaj" required><br>
        <div class="col-25">
            <label for="email">Email Address:</label></div>
        <input type="email" id="email" name="email" placeholder="aditya_bhardwaj@gmail.com" required><br>
        <div class="col-25">
            <label for="uid">User ID:</label></div>
        <input type="text" id="username" name="username" placeholder="10001" required>
        <span id="Result"></span><br>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#username').keyup(function(){
                    $.post("check_user.php", {
                        username: $('#username').val()
                    }, function(response){
                        $('#Result').fadeOut();
                        setTimeout("finishAjax('Result', '"+escape(response)+"')", 400);
                    });
                    return false;
                });
            });
            function finishAjax(id, response) {
                $('#Result').hide();
                $('#'+id).html(unescape(response));
                $('#'+id).fadeIn();
            }
        </script>


        <div class="col-25">
            <label for="department">Department:</label></div>

        <input type="text" id="department" name="department" placeholder="Technical Expert" autofocus required><br>
        <div class="col-25">
            <label for="role">Role:</label></div>
        <input type="text" id="role" name="role" placeholder="Help Others" required><br>
        <div class="col-25">
            <label for="password">Password:</label></div>

        <input type="password" id="password" name="password" placeholder="Avoid Simple Passwords" required><br>

        <div class="col-25">
            <label for="usertype">User Type:</label></div>
        <div class="myDIV"><select id="usertype" name="usertype">
                <option value="LEARNER">LEARNER</option>
                <option value="ADMIN">ADMIN</option>
            </select>

            <button style='font-size:15px;border-radius:60px;color:grey;width:2.5%;background-color:white;'><i class='fas fa-info'></i></button></div>
        <div class="hide">Control the user's permissions by assigning them to a custom user type.</div>

        <div class="col-25">
            <label for="language">Language:</label></div>
        <select id="language" name="language">
            <option value="english">English</option>
            <option value="hindi">Hindi</option>
        </select>
        <br>
        <div class="y">
            <input type="radio" id="active" name="status" value="ACTIVE" checked>
            <label for="active"> Active</label><br>
            <input type="radio" id="inactive" name="status" value="INACTIVE">
            <label for="inactive">Inactive</label><br></div>
        <div class="hide" style="margin-left:50px;">Check if you'd like to exclude user from all automated notifications,except for essential system emails(i.e.,password and username reset).</div>
        -->
        <input type="submit" id="submit" value="Add Group" style="border-radius:20px;
background-color:#1d3056;
margin-left:120px;
margin-top:40px;
margin-bottom:40px;
font-size:20px;
width:20%;padding:15px;
border:none;outline:none;color:#fff;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.5),0 17px 50px 0 rgba(0,0,0,0.19);">
        <button type="reset" style="border-radius:20px;
background-color:#1d3056;
margin-left:120px;
margin-top:40px;
margin-bottom:40px;
font-size:20px;
width:20%;padding:15px;
border:none;outline:none;color:#ffffff;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.5),0 17px 50px 0 rgba(0,0,0,0.19);"><a href="group.php" style="text-decoration: none; color: #FFFFFF">Cancel</a></button>
    </form>
</div>

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
