<!-- library php -->
<?php include "libs/inc.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Wrap Dashboard -->
    <div id="dashboard">
        <div class="row g-0">
            <!-- Side Bar -->
            <div class="side-content col-md-3 min-vh-100 position-fixed">
                <div class="inner">
                    <div class="logo">
                        <img src="assets/images/logo.png" alt="">
                        <h3>SMK MARYNOLL</h3>
                    </div>
                    <div class="info-login">
                        <div class="d-flex">
                            <img src="assets/images/users.jpg" alt="">
                            <p>
                                <strong class="d-block">Hanifan</strong>
                                <small>Administrator</small>
                            </p>
                        </div>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-file-alt"></i> Formulir Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_user.php"><i class="fas fa-table"></i> Data Pendaftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_user.php"><i class="fas fa-user"></i> Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-print"></i> Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Side Bar -->