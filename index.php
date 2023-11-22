<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <h1>Login</h1>
                    <form action="dashboard.html" method="POST">
                        <div class="form-group mb-3">
                          <label for="nisn">NISN</label>
                          <input type="text" class="form-control mt-1" name="nisn" id="nisn" aria-describedby="nisn">                          
                        </div>
                        <div class="form-group mb-3">
                          <label for="password">PASSWORD</label>
                          <input type="password" class="form-control mt-1" name="password" id="password">
                        </div>
                        <div class="form-group mb-3">
                            <small id="emailHelp" class="form-text text-muted">Belum punya Akun ? <a href="registrasi.php">Registrasi</a></small>
                        </div>
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>