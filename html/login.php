<?php
include 'db_config.php';
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit']))
{
    if (empty($_POST['username']) || empty($_POST['password']))
    {
        echo"<script>alert('Username or Password is invalid');
window.location.href='loginpage.php';
</script>";
    }
    else{
// Define $username and $password
        $username = $_POST['username'];
        $ipassword = $_POST['password'];

// SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT USER_ID, PASSWORD,USER_TYPE from account where USER_ID=? LIMIT 1";
// To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username, $hash,$usertype);
        $stmt->store_result();
        if($stmt->fetch()) {//fetching the contents of the row {
            if (password_verify($ipassword, $hash)) {
                $_SESSION['login_user'] = $username; // Initializing Session
                $_SESSION['user_type'] =$usertype;
                date_default_timezone_set('Asia/Kolkata');
                $date = date('h:i:s',time());
                $update="UPDATE account SET LOGINTIME='$date' where USER_ID='$username'";
                $conn->query($update);

                $query1 = "SELECT USER_ID, FIRSTNAME, LASTNAME from account where USER_ID = '$username'";
                $result = mysqli_query($conn, $query1);
                $row = mysqli_fetch_assoc($result);
                $userlog_name = $row['FIRSTNAME'] .' ' .$row['LASTNAME'];
                $date = date('y.m.d',time());
                $update_userlog="INSERT INTO `user_log`(`USER_ID`, `USER_NAME`, `LOGINTIME`) VALUES ('$username', '$userlog_name','$date')";
                $conn->query($update_userlog);
            }
            else{

                echo "<script>alert('Username or Password is invalid');
    window.location.href='loginpage.php';
    </script>";

            }
        }
        else
        {
            echo "<script>alert('Username or Password is invalid');
     window.location.href='loginpage.php';
     </script>";
        }
        mysqli_close($conn); // Closing Connection
    }}
?>
