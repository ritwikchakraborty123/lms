
<?php
$con=mysqli_connect('localhost','root','root','try');//connecting to database
$query="select * from template";//To retrieve students into from database

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}
else{
    $fire=mysqli_query($con,$query);
    $row=mysqli_fetch_array($fire);
    header('Content-type: image/jpeg');
    $font = realpath('arial.ttf');
    $image = imagecreatefromjpeg("example.jpg");
    $color = imagecolorallocate($image, 0, 0, 0);
    $date = $row['Date'];
    imagettftext($image, 10, 0, 170, 413, $color, $font, $date);
    $user_name = $row['User Name'];
    imagettftext($image, 42, 0, 170, 498, $color, $font, $user_name);
    $course_name = $row['Course Name'];
    imagettftext($image, 42, 0, 170, 635, $color, $font, $course_name);
    imagejpeg($image);
    imagedestroy($image);
}
?>
