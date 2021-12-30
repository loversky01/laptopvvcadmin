
<?php
 $dbhost = 'sql598.main-hosting.eu';
 $dbuser = 'u840460203_VSmIt';
 $dbpass = 'cVUOPcIg3E';
 $dbname = 'u840460203_Cf1sb';
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
 
 if(! $conn ) {
 die('Could not connect: ' . mysqli_error());
 }
?>