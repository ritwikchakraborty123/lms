<?php
include 'db_config.php';
session_start(); // Starting Session
if (isset($_POST['submit']))
{
    if (empty($_POST['username']))
    {
        echo"<script>alert('Username is invalid');
        window.location.href='contact.php';
        </script>";
    }
    else{
// Define $username and $password
        $username = $_POST['username'];
// SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT EMAIL from account where USER_ID=? LIMIT 1";
// To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        if($stmt->fetch()) {//fetching the contents of the row
            require '../PHPMailer/PHPMailerAutoload.php';
            require 'credential.php';
                function password_generate($chars)
                {
                    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                    return substr(str_shuffle($data), 0, $chars);
                }
                $changepass  = password_generate(7);
                $HASHPASSWORD = password_hash($changepass,PASSWORD_DEFAULT);
                mysqli_query($conn,"UPDATE account SET PASSWORD='$HASHPASSWORD' WHERE USER_ID='" . $_POST['username'] . "'");
                $result = mysqli_query($conn,"SELECT * FROM account where USER_ID='" . $_POST['username'] . "'");
                $row = mysqli_fetch_assoc($result);
                $toemailid=$row['EMAIL'];
                $mail = new PHPMailer;
                //$mail->SMTPDebug = 4;                               // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = EMAIL;                 // SMTP username
                $mail->Password = PASS;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom(EMAIL, 'Learning Management System');
                $mail->addAddress($toemailid);     // Add a recipient

                $mail->addReplyTo(EMAIL);
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body = 'Dear User,<br><br>Thank You for contacting the Learning Management Team for resetting your password.<br><br>Your New Password is = ' .$changepass . '<br><br>Request you to please go ahead and change your password for security purpose.<br><br>Regards<br>Team LMS'  ;
                $mail->Helo = "HELO";


                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo "<script>alert('Mail Sent Successfully with Your Credentials.');
                    window.location.href='loginpage.php';
                    </script>";
                }

            }
        else
        {
            echo "<script>alert('Username is invalid');
            window.location.href='contact.php';
        </script>";
        }
        mysqli_close($conn); // Closing Connection
    }}
if (isset($_POST['Cancel']))
{
    ?>
    <script type="text/javascript">
        window.location = "loginpage.php";
    </script>
    <?php
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>    Login     </title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
<header>
    <div class="main-header">
        <form action="" method="post">

            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="150" viewBox="0 0 130.257 70.656">
                <g id="Group_354" data-name="Group 354" transform="translate(-2150.534 -955)">
                    <g id="Group_351" data-name="Group 351">
                        <path id="Path_2" data-name="Path 2" d="M486.5,192.786c.663,11.777.815,23.549.842,35.328-.023,11.777-.175,23.549-.842,35.328-.667-11.777-.82-23.549-.844-35.328.028-11.777.181-23.549.844-35.328" transform="translate(1672.11 762.214)" fill="#7b5f39"/>
                        <path id="Path_3" data-name="Path 3" d="M507.782,238.912c.349,3.262.532,6.517.655,9.774s.171,6.517.188,9.775c-.015,3.262-.051,6.517-.185,9.775s-.308,6.517-.658,9.774c-.351-3.262-.535-6.517-.658-9.774s-.17-6.517-.185-9.775c.017-3.262.053-6.516.188-9.775s.306-6.517.656-9.774" transform="translate(1658.062 731.866)" fill="#7b5f39"/>
                        <path id="Path_4" data-name="Path 4" d="M465.222,238.912c.349,3.262.532,6.517.656,9.774s.171,6.517.188,9.775c-.015,3.262-.051,6.517-.185,9.775s-.308,6.517-.659,9.774c-.351-3.262-.535-6.517-.659-9.774s-.17-6.517-.185-9.775c.017-3.262.053-6.516.188-9.775s.307-6.517.655-9.774" transform="translate(1686.156 731.866)" fill="#7b5f39"/>
                    </g>
                    <g id="Group_353" data-name="Group 353" transform="translate(146)">
                        <path id="Path_5" data-name="Path 5" d="M142.007,270.757a6.557,6.557,0,0,1,3.352,6.191c-.228,4.863-3.893,7.73-9.863,7.73-3.35,0-6.487-.864-7.848-2.269-.617-1.56-.093-4.708.885-6.337h.328c-.3,3.892,2.562,7.1,7.039,7.03,3.247-.059,5.162-1.857,5.16-4.2,0-1.515-.979-2.526-2.985-3.858l-6.5-4.316c-2.57-1.7-3.845-3.977-3.573-6.7.316-3.865,3.15-6.536,7.859-6.536a48.555,48.555,0,0,1,5.084.384h2.344l-.489,5.486h-.359c-.005-2.591-2.106-4.3-5.263-4.3-2.939,0-4.8,1.588-4.885,3.592-.092,1.471,1.035,2.456,2.6,3.471Z" transform="translate(1908.618 719.41)" fill="#0c2445"/>
                        <path id="Path_6" data-name="Path 6" d="M204.594,283.456c3.322.017,5.7-1.809,5.7-6.043.01-4.366-2.834-6.069-6.159-6.062l-.008-.35c2.353.007,4.58-1.344,4.587-5.114-.007-3.749-1.91-5.261-4.779-5.255h-1.067v22.823Zm.6-24.43c5.422,0,9.477,1.82,9.481,6.393a5.2,5.2,0,0,1-4.588,5.523c3.777.34,6.635,2.958,6.623,6.93.012,4.8-4.19,7.287-10.51,7.287H194.39l.008-.372h.472a2.4,2.4,0,0,0,2.392-2.324v-20.75a2.389,2.389,0,0,0-2.39-2.314H194.4l-.008-.372Z" transform="translate(1864.531 718.404)" fill="#0c2445"/>
                        <path id="Path_7" data-name="Path 7" d="M291.352,263.371v-.393a3.416,3.416,0,0,0-3.543-3.658h-6.386v10.862h4.951a3.116,3.116,0,0,0,3.164-3.2v-.324h.365v8.629h-.365v-.324a3.112,3.112,0,0,0-3.118-3.2h-5v9.381a2.392,2.392,0,0,0,2.391,2.348h.472v.374h-11.33l.007-.374h.472a2.393,2.393,0,0,0,2.392-2.348V260.32a2.335,2.335,0,0,0-2.387-2.226h-.472l-.007-.372h14.313a16.187,16.187,0,0,0,4.455-.678v6.332Z" transform="translate(1812.492 719.712)" fill="#0c2445"/>
                        <path id="Path_8" data-name="Path 8" d="M368.084,273.264l.363,6.427c-1.675,2.763-4.855,4.995-10.493,4.995-9.166-.039-15.145-5.1-15.145-13.629,0-8.349,5.77-13.551,15.252-13.551a20.449,20.449,0,0,1,9.282,2.022l.073,6.4H367.1c-1.359-4.9-4.565-6.852-8.67-6.854-5.924,0-9.541,4.559-9.541,11.895,0,7.39,3.5,11.989,9.06,12.139,5.743-.008,8.655-2.509,9.819-9.849Z" transform="translate(1766.344 719.405)" fill="#0c2445"/>
                    </g>
                </g>
            </svg>
            <h2>Learning Management System</h2>
            <h3>FORGOT YOUR PASSWORD</h3>
            <p><input type="text" id="name" name="username" placeholder="User ID" style="color: #90774f"></p>
            <button name="submit" type="submit" id="log">VERIFY</button>
            <button name="Cancel" type="submit">Cancel</button>
        </form>
    </div>
</header>
</body>
</html>
