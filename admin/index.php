<?php
session_start();
require_once '../service/database.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0) {
    header('Location: ../index.php');
    exit();
}

$query = "SELECT report.id_report, report.isi_laporan, report.tgl_report, akun.username FROM report JOIN akun ON report.akun_id = akun.id";
$result = mysqli_query($connection, $query);

$akun_query = "SELECT id, username FROM akun";
$akun_result = mysqli_query($connection, $akun_query);

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Daftar report</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="overflow-x-auto mt-4 border border-gray-400 rounded-2xl shadow-xl">
            <table class="w-full text-sm text-left text-gray-500 overflow-hidden">
                <caption class="p-5 text-gray-600 bg-gray-1500 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Tabel pengaduan
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Tabel yang berisi aduan yang dilakukan oleh user.</p>
                </caption>
                <thead class="text-xs text-gray-600 uppercase bg-gray-150 dark:text-gray-400 text-left">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Isi Laporan</th>
                        <th scope="col" class="px-6 py-3">Tanggal report</th>
                        <th scope="col" class="px-6 py-3">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                        echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $no . '</th>';
                        echo '<td class="px-6 py-4 whitespace-no-wrap">' . $row['isi_laporan'] . '</td>';
                        echo '<td class="px-6 py-4 whitespace-no-wrap">' . $row['tgl_report'] . '</td>';
                        echo '<td class="px-6 py-4 whitespace-no-wrap">' . $row['username'] . '</td>';
                        echo '</tr>';
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="overflow-x-auto mt-4  border border-gray-400 rounded-2xl shadow-xl ">
            <table class=" w-full text-sm text-left text-gray-500 overflow-hidden">
                <caption class="p-5 text-gray-600 bg-gray-1500 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Tabel akun
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Tabel yang berisi daftar akun yang terdaftar.</p>
                </caption>
                <thead class="text-xs text-gray-600 uppercase bg-gray-150 dark:text-gray-400 text-left">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Akun</th>
                        <th scope="col" class="px-6 py-3">username</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($akun_row = mysqli_fetch_assoc($akun_result)) {
                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                        echo '<td class="px-6 py-4 whitespace-no-wrap">' . $akun_row['id'] . '</td>';
                        echo '<td class="px-6 py-4 whitespace-no-wrap">' . $akun_row['username'] . '</td>';
                        echo '<td class="px-6 py-4 whitespace-no-wrap">';
                        if ($akun_row['id'] != $_SESSION['id']) {
                            $query_admin_check = "SELECT is_admin FROM akun WHERE id = " . $akun_row['id'];
                            $admin_result = mysqli_query($connection, $query_admin_check);
                            $admin_row = mysqli_fetch_assoc($admin_result);
                            $is_admin = $admin_row['is_admin'];
                            echo ($is_admin == 1) ? '<a href="../admin/crud.php?id=' . $akun_row['id'] . '" class="text-blue-600 hover:text-blue-800">Copot Admin</a> ' : '<a href="../admin/crud.php?id=' . $akun_row['id'] . '" class="text-blue-600 hover:text-blue-800">Jadikan Admin</a> ';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>