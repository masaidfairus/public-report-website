<?php
include("database/connect.php");

// HARUS DITAMBAG KETIKA MENGGUNAKAN SESSION
session_start();

// REDIRECT USER YANG BELUM LOGIN KE LOGIN.php
if (!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

// Penjelasan:
// JOIN akan menggabungkan data dari kedua tabel berdasarkan kondisi yang Anda tentukan, dalam hal ini users.id = reports.user_id.

$result = mysqli_query($conn, 'SELECT users.*, reports.* FROM users JOIN reports ON users.id = reports.user_id');

// VARIABLE UNTUK LOOPING NUMBER
$i = 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - E-Report Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">

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
                    <ul class="navbar-nav me-auto mb-3 mb-lg-0 mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="views/create.php">Create Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="auth/logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6 bg-danger text-white py-5 px-4">
                    <h1 class="text-left fw-semibold">Welcome to the public complaints web</h1>
                    <?php
                    // MEMBUAT CONTROL DAN MENGAMBIL NAMA DI LOGIN.PHP DAN EXECUTE
                    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                        $name = $_SESSION['name'];
                        echo "<h5 class='mt-4'>Welcome, Mr. $name</h5>";
                    } else {
                        echo "<h5 class='mt-4'>Welcome, Mr. Guest</h5>";
                    }
                    ?>
                </div>
                <div class="col-md-6 bg-image"
                    style="background-image: url('image/public.png'); height: 300px; background-size: cover; background-position: center;">
                </div>
            </div>
        </div>

        <div class="table-responsive container">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Report</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($reports = mysqli_fetch_assoc($result)) { ?>
                        <tr class="table-highlight">
                            <td><?php echo $i ?></td>
                            <td><?php echo $reports['title'] ?></td>
                            <td><?php echo $reports['name'] ?></td>
                            <?php
                            if ($reports['status'] == 'DONE') {
                                echo "<td><span class='badge bg-success'>" . $reports['status'] . "</span></td>";
                            } else if ($reports['status'] == 'PENDING') {
                                echo "<td><span class='badge bg-warning'>" . $reports['status'] . "</span></td>";
                            } else {
                                echo "<td><span class='badge bg-danger'>" . $reports['status'] . "</span></td>";
                            }
                            ?>
                            <?php
                            echo '<td>
                                    <button 
                                    class="btn btn-primary btn-sm btn-action"
                                    onclick="window.location.replace(\'./views/details.php?id=' . $reports['id'] . '\');">
                                    Check Details</button>
                                </td>';
                            ?>

                        </tr>
                        <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>