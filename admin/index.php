<?php
session_start();
require_once '../service/database.php';

$query = "SELECT pengaduan.id_pengaduan, pengaduan.isi_laporan, pengaduan.tgl_pengaduan, akun.username FROM pengaduan JOIN akun ON pengaduan.akun_id = akun.id";
$result = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Pengaduan</title>
</head>

<body>
    <h1 class="text-center">Daftar Seluruh Pengaduan</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Tanggal Pengaduan</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $no . '</th>';
                            echo '<td>' . $row['isi_laporan'] . '</td>';
                            echo '<td>' . $row['tgl_pengaduan'] . '</td>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '</tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>