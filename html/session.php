<?php
// mysqli_connect() function opens a new connection to the MySQL server.
include 'db_config.php';
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT USER_ID from account where USER_ID = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['USER_ID'];

?>
