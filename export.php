<?php
// including the connection file
include('connection.php');
 
// set headers of csv format and force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=users.csv');
 
$output = "Name,Username,Email,Password,Status\n";

$sql = 'SELECT * FROM wp_users ORDER BY ID desc';
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
    $output .= $row['display_name'].",".$row['user_login'].",".$row['user_email'].",".$row['user_pass'].",".$row['user_status']."\n";
}
echo $output;
exit;
?>