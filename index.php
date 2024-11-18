<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Website Pengaduan Masyarakat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Pengaduan Masyarakat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/register.php">Register</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pengaduan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./akun/self.php">Pengaduan Saya</a></li>
                                <li><a class="dropdown-item" href="./pengaduan/create.php">Buat Pengaduan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/logout.php">Logout</a>
                        </li>
                        <?php if ($_SESSION['is_admin'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./admin/index.php">Admin</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="alert alert-info">
            <?php include './service/database.php'; ?>
        </div>
        <h1 class="text-center">Selamat Datang, <?= $_SESSION['username'] ?? '' ?>, di Website Pengaduan Masyarakat</h1>
        <div class="d-grid gap-2 col-6 mx-auto mt-4">
            <a class="btn btn-primary" href="./form-pengaduan.php">Buat Pengaduan</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>