<?php
require_once '../service/database.php';

if (isset($_POST['register'])) {
    session_start();
    if (isset($_SESSION['id'])) {
        header('Location: ../index.php');
        exit();
    }
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validation
    $errors = [];
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        // Check if username already exists
        $check_query = "SELECT * FROM akun WHERE username = '$username'";
        $check_result = mysqli_query($connection, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $errors[] = "Username already exists.";
        } else {
            $query = "INSERT INTO akun (username, password, is_admin) VALUES ('$username', '$password', false)";
            if (mysqli_query($connection, $query)) {
                header('Location: login.php');
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connection);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
    <style>
        body {
            background-color: #f8fafc;
        }

        .card {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <?php if (!empty($errors)) : ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <?php foreach ($errors as $error) : ?>
                            <span class="block sm:inline"><?= htmlspecialchars($error) ?></span><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign up to your account
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <input type="submit" name="register" class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        already have an account? <a href="./login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>