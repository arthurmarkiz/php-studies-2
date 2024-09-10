<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-700">
    <form action="fh.inc.php" method="post"
    class="flex flex-col items-center mt-10">
        <input name="username" type="text" placeholder="Username"
        class="rounded-md m-2 py-1 px-2 outline-none">
        <input name="password" type="password" placeholder="Password"
        class="rounded-md m-2 py-1 px-2 outline-none">
        <button name="submit" class="bg-emerald-500 rounded-md text-white font-bold mt-6 py-1 px-6
        hover:brightness-110 duration-200">Sign up</button>
    </form>
    <div>
    <?php

        if (isset($_POST['submit'])) {

            $min = 5;
            $max = 10;
            $namesAlredyExists = ['annahy', 'student', 'mikeos'];

            $username = $_POST['username'];
            $password = $_POST['password'];

            if (strlen($username) < $min || strlen($username) > $max) {
                echo '<p class="text-md mt-6 text-center text-red-500">Username has to be between ' . $min . ' - ' . $max . ' characters.<p/>';
            }
            else if (in_array(strtolower($username), $namesAlredyExists)) {
                echo '<p class="text-md mt-6 text-center text-red-500">This Username already exists.<p/>';
            }
            else {
                echo '<p class="text-xl mt-6 text-center text-emerald-500 font-bold">Your account has been created!<p/>';
            }
        }

    ?>
    </div>
</body>
</html>