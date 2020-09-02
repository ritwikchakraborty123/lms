<?php
include 'db_config.php';
$query = "SELECT FIRSTNAME,LASTNAME,EMAIL,USER_TYPE,DOB,USER_ID FROM account";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Users.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('FIRSTNAME','LASTNAME','EMAIL','USERTYPE','DOB','USER_ID'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}

?>
