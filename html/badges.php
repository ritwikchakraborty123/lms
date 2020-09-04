<a href="dashboard.php"> 
    Back to DashBoard
</a>

<?php
include 'db_config.php';
//session_start();

include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: loginpage.php"); // Redirecting To Home Page
}

$login_session = $_SESSION['login_user'];

$sql="SELECT * FROM `course_status` WHERE `STATUS` LIKE 'completed' AND `USER_ID` LIKE '$login_session' ";

$row=mysqli_query($conn,$sql);
echo "<h1> completed courses ::</h1><br>";
echo "<td> ";
while($r=mysqli_fetch_assoc($row))
{
    $course_id=$r['COURSE_ID'];
    $sql_course="SELECT * FROM `courses` WHERE `COURSE_ID` LIKE '$course_id' ";
    $row_course=mysqli_query($conn,$sql_course);

    // echo "<h2>".$course_id."</h2><br>";
    echo "<tr><h2>".mysqli_fetch_assoc($row_course)['COURSE_NAME']." completed </h2></tr>"."<br>";
}
echo "</td>";

?>