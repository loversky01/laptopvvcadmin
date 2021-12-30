
<?php 
include('connection.php');
 
$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
 $input = fopen($csv_file, 'a+');
 $row = fgetcsv($input, 1024, ','); // here you got the header
 while ($row = fgetcsv($input, 1024, ',')) {
 // insert into the database

 $sql = 'insert into wp_users(display_name,user_login,user_pass,user_status) VALUES("'.$row[9].'","'.$row[1].'","'.$row[2].'","'.$row[8].'")';
 mysqli_query($conn, $sql);
 }
}
header('location: admin.php');
?>