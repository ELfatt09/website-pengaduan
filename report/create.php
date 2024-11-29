<?php
require_once '../service/database.php';

if (isset($_POST['submit'])) {
    session_start();
    if (!isset($_SESSION['id'])) {
        header('Location: ../auth/login.php');
        exit();
    }
    $isi_laporan = $_POST['isi_laporan'];

    $query = "INSERT INTO report (isi_laporan, akun_id) VALUES ('$isi_laporan', $_SESSION[id])";
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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Membuat Report</title>
</head>

<body class="bg-gradient-to-r from-blue-50 to-gray-100 min-h-screen flex justify-center items-center">
    <div class="w-full max-w-lg mx-auto bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Membuat Report</h1>
        <?php if (isset($error)) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>
        <form action="create.php" method="post" class="space-y-4">
            <div>
                <label for="isi_laporan" class="block text-sm font-medium text-gray-700">Tulis Laporan Anda</label>
                <textarea id="isi_laporan" name="isi_laporan" rows="5" class="block w-full mt-2 p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis laporan Anda..." required></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>