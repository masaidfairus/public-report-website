<?php
session_start(); // HARUS DITAMBAG KETIKA MENGGUNAKAN SESSION

// REDIRECT USER YANG SUDAH LOGIN KE INDEX
if (isset($_SESSION['login'])) {
    header('location: ../index.php');
    exit;
}

include('authProcess.php');

if (isset($_POST['login'])) {
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Report Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css">

</head>

<body>
    <main class="d-flex align-items-center justify-content-center cstm">
        <div class="container card p-5" style="width: 32rem;">
            <h1 class="mb-3 fs-2">Log in to your account</h1>
            <p class="mb-5">Don't have an account? <a href="register.php">Sign up</a></p>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email
                        address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="login">
                    Submit
                </button>
        </div>
    </main>
</body>

</html>