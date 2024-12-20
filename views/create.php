<?php
include("../database/connect.php");
include("../controllers/userController.php");

// REDIRECT USER YANG BELOM LOGIN KE KE LOGIN/REGISTER
if (!isset($_SESSION['login'])) {
    header('location: ../auth/login.php');
    exit;
}

if(isset($_GET['createReport'])) {
    createReport($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report - E-Report Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Links -->
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="views/create.php">Create Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../auth/logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container my-auto mt-5">
            <h1 class="mb-3 fw-semibold">Report your complaint</h1>
            <p class="mb-5">Make sure you report a real fact/news or problems that you have!</p>
            <form action="" method="GET">
                <div class="mb-3">
                    <label for="title" class="form-label">Report Name</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your report name here!" required>
                </div>
                <div class="mb-5">
                    <label for="description" class="form-label">Report Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter your explanations here!"></textarea>
                </div>
                <button type="submit" class="btn btn-primary bg-danger border-danger" name="createReport">
                    Submit
                </button>

        </div>

    </main>
</body>

</html>