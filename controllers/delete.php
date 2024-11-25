<?php 
include("../database/connect.php");

if (isset($_POST["id"]) && !empty($_POST['id'])) {
    // TANGKAP ID LALU TARUH DI VARIABLE
    $id = $_POST['id'];

    // HAPUS DATA BERDASARKAN ID
    $result = mysqli_query($conn,"DELETE FROM reports WHERE id=$id");

    if($result) {
        echo "<script>
            alert('Data has been deleted');
            window.location.replace('../index.php');
        </script>";
    } else {
        echo "<script>
            alert('Sorry data failed to be deleted');
            window.location.replace('../index.php');
        </script>";
    }
}