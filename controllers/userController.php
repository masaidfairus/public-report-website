<?php
include("../database/connect.php");
session_start();

function createReport($data)
{
    global $conn; // Gunakan koneksi global

    // Escape string untuk mencegah SQL Injection
    $title = mysqli_real_escape_string($conn, $data['title']);
    $description = mysqli_real_escape_string($conn, $data['description']);
    $user_id = $_SESSION['user_id']; // Ambil ID pengguna dari sesi

    // Query INSERT
    $query = "INSERT INTO reports (user_id, title, description) 
                VALUES ('$user_id', '$title', '$description')";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Successfully create new report');
            window.location.replace('../index.php');
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn); // Display or log the error
    }
}

function updateReport($data)
{
    global $conn;

    $title = $data['title'];
    $description = $data['description'];
    $id = $data['id'];
    

    $query = "UPDATE reports SET title='$title', description='$description' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Your report has been successfully updated');
            window.location.replace('../index.php');
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn); // Display or log the error
    }
}

?>