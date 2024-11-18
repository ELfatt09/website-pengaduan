<?php
require_once '../service/database.php';

if (isset($_POST['submit'])) {
    session_start();
    $isi_laporan = $_POST['isi_laporan'];

    $query = "INSERT INTO pengaduan (isi_laporan, akun_id) VALUES ('$isi_laporan', $_SESSION[id])";
    if (mysqli_query($connection, $query)) {
        header('Location: ../index.php');
        exit();
    } else {
        $error = "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Membuat Pengaduan</title>
</head>

<body>
    <h1 class="text-center">Membuat Pengaduan</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Membuat Pengaduan</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>
                        <form action="create.php" method="post">
                            <div class="mb-3">
                                <label for="isi_laporan" class="form-label">Isi Laporan</label>
                                <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="3"></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>