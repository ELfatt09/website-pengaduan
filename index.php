<?php
session_start();
include './service/database.php';
?>
<!DOCTYPE html>
<html lang="en"
    class="scroll-smooth h-full bg-gradient-to-br from-gray-100 to-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Website E-REPORT</title>
</head>

<body class="flex flex-col h-full">
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex gap-x-12">
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <a href="./auth/login.php" class="text-sm/6 font-semibold text-gray-900">Login</a>
                        <a href="./auth/register.php" class="text-sm/6 font-semibold text-gray-900">register</a>
                    <?php } else { ?>
                        <a href="./akun/self.php" class="text-sm/6 font-semibold text-gray-900">Pengaduan Saya</a>
                        <a href="./report/create.php" class="text-sm/6 font-semibold text-gray-900">Buat Pengaduan</a>
                        <a href="./auth/logout.php" class="text-sm/6 font-semibold text-red-400">Logout</a>

                        <?php if ($_SESSION['is_admin'] == true) { ?>
                            <a href="./admin/index.php" class="text-sm/6 font-semibold text-gray-900">Admin Panel</a>

                    <?php }
                    } ?>
                </div>
            </nav>
        </header>
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Website E-REPORT</h1>
                    <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Aplikasi Website E-REPORT berfungsi untuk menerima laporan dan aduan dari masyarakat, dan dapat membantu masyarakat untuk mengirimkan laporan dan aduan secara online.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="./report/create.php" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat Laporan</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.6.0/dist/cdn.min.js"></script>
</body>

</html>