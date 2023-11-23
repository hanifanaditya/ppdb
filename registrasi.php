<?php
// cek login
session_start();
if(isset($_SESSION["login"])){
    // jika sudah , maka di redirect
    header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrasi</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="welcome">
            <div class="row g-0 min-vh-100">
                <div class="content col-md-6 d-flex align-items-center">
                    <div class="inner">
                        <div class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </div>
                        <h1>Welcome to SMK MARYNOLL</h1>
                        <p>Sistem Pendaftaran Siswa Baru 2021 / 2022</p>
                    </div>
                </div>
                <div class="form col-md-6 d-flex align-items-center">
                    <div class="inner">
                        <!-- message -->
                        <?php if(isset($_GET["pesan"])){ ?>
                            <div class="alert alert-info" role="alert">
                                <?= $_GET["pesan"] ?>
                            </div>
                        <?php } ?>
                        <!-- end message -->
                        <h1>Registrasi</h1>
                        <form action="login.php">
                            <div class="form-group mb-3">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control mt-1" name="nama" id="nama" aria-describedby="nama">                          
                            </div>                        
                            <div class="form-group  mb-3">
                                <label for="email">EMAIL</label>
                                <input type="email" class="form-control mt-1" name="email" id="email" aria-describedby="email">                          
                            </div>
                            <div class="form-group  mb-3">
                                <label for="password">PASSWORD</label>
                                <input type="password" class="form-control mt-1" name="password" id="password">
                            </div>
                            <div class="form-group  mb-3">
                                <small id="emailHelp" class="form-text text-muted">Sudah punya Akun ? <a href="index.php">Login</a></small>
                            </div>
                            <button type="submit" class="btn btn-primary">REGISTRASI</button>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- Script -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>