<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name =  "e-report";

    $conn = mysqli_connect($hostname, $username, $password, $db_name);

    // if ($conn->connect_error) {
    //     echo "Koneksi database error";
    //     die("error!"); 
    // } else {
    //     echo "Koneksi Berhasil"; 
    // }
?>