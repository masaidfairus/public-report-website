<?php
require('../database/connect.php');
session_start();
function register($request)
{
    global $conn;
    // AMBIL EMAIL LALU SIMPAN DI VARIABLE
    $email = strtolower(trim($request['email']));
    $name = $request['name'];

    // CEK APAKAH EMAIL SUDAH SESAUAI DENGAN FORMAT
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            alert('Your email address is not valid');
        </script>";
        return;
    }

    // CEK APAKAH EMAIL SUDAH ADA DI DATABASE
    $resultCheckEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($resultCheckEmail) > 0) {
        echo "<script>
            alert('Email has been used by others');
        </script>";
        return;
    }

    // AMBIL PW LALU SIMPAN DI VARIABLE

    //
    $pw = mysqli_real_escape_string($conn, $request['password']);
    $pw2 = mysqli_real_escape_string($conn, $request['confirmPassword']);

    // CEK PW1 === PW2
    if ($pw !== $pw2) {
        echo "<script>
            alert('Password is incorrect');
        </script>";
        return;
    }

    // HASH PW -> Mengacak pw
    $pw = password_hash($pw, PASSWORD_DEFAULT);
    $pw2 = mysqli_real_escape_string($conn, $request['confirmPassword']); // Keep this as is

    // SIMPAN EMAIL DAN PW
    $result = mysqli_query($conn, "INSERT INTO users(name, email, password) VALUES('$name','$email', '$pw')");

    if ($result) {
        echo "<script>
            alert('Success to make a new account, Please login');
            window.location.replace('login.php');
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn); // Display or log the error
    }
}


function login($request)
{
    global $conn;

    //AMBIL EMAIL & PW LALU SIMPAN DI VARIABLE
    $email = trim($request['email']);
    $pw = $request['password'];
    $name = $request['name'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    //QUERY EMAIL YANG SAMA DENGAN $email
    if (mysqli_num_rows($result) === 1) {

        //FETCH DATA
        $dataFetch = mysqli_fetch_assoc($result);

        //CEK APAKAH DATA SAMA DENGAN DATBASE
        if (password_verify($pw, $dataFetch['password'])) {
            if ($name === $dataFetch['name']) {

                // SET SESI NAMA UNTUK DIAMBIL DI INDEX.PHP
                $_SESSION['user_id'] = $dataFetch['id']; // Simpan ID 
                $_SESSION['user_email'] = $dataFetch['email']; // Simpan email
                $_SESSION['name'] = $dataFetch['name'];
                $_SESSION['login'] = true;
                header('location: ../index.php');
                exit;
            } else {
                echo "<script>
                    alert('Name is incorrect!');
                </script>";
                return;
            }
        } else {
            echo "<script>
                alert('Password is incorrect!');
            </script>";
            return;
        }
    } else {
        echo "<script>
        alert('Email is incorrect!');
        </script>";
    }
}