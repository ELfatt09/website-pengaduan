<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php');
    exit();
}
require_once '../service/database.php';

$query = "SELECT * FROM report WHERE akun_id = " . $_SESSION['id'];
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Pengaduan Saya</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-4">
        <h1 class="text-center text-3xl font-bold text-indigo-600 mb-6">Pengaduan Saya</h1>
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th scope="col" class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">No</th>
                            <th scope="col" class="w-5/12 py-3 px-4 uppercase font-semibold text-sm">Isi Laporan</th>
                            <th scope="col" class="w-3/12 py-3 px-4 uppercase font-semibold text-sm">Tanggal report</th>
                            <th scope="col" class="w-3/12 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="border-b">';
                            echo '<th scope="row" class="py-3 px-4 text-center">' . $no . '</th>';
                            echo '<td class="py-3 px-4">' . $row['isi_laporan'] . '</td>';
                            echo '<td class="py-3 px-4">' . $row['tgl_report'] . '</td>';
                            echo '<td class="py-3 px-4 text-center">';
                            echo '<a href="../report/update.php?id=' . $row['id_report'] . '" class="text-indigo-600 hover:text-indigo-800 mx-2">Update</a>';
                            echo '<a href="../report/delete.php?id=' . $row['id_report'] . '" class="text-red-600 hover:text-red-800 mx-2">Delete</a>';
                            echo '</td>';
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