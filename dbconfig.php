<?php
    error_reporting(0);
    $host = "sql598.main-hosting.eu";
    $user = "u840460203_VSmIt";
    $password = "cVUOPcIg3E";
    $database = "u840460203_Cf1sb";
    $links = mysqli_connect($host,$user,$password);
    mysqli_select_db($links, $database);
    mysqli_set_charset($links,"utf8");
?>




