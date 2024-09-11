<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login DB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <div class="flex space-x-10 justify-center mt-20">
        <div>
            <!-- CREATE FORM -->
            <form action="index.php" method="post"
            class="flex flex-col items-center mt-10">
                <input name="username" type="text" placeholder="Username" autocomplete="off"
                class="rounded-md m-2 py-1 px-2 outline-none">
                <input name="password" type="password" placeholder="Password" autocomplete="off"
                class="rounded-md m-2 py-1 px-2 outline-none">
                <button name="signup" class="bg-emerald-500 rounded-md text-white font-bold mt-6 py-1 px-6
                hover:brightness-110 duration-200">Sign up</button>
            </form>
            <?php
                if (isset($_POST['signup'])) {
                    include 'db.inc.php';

                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = mysqli_real_escape_string($connection, $_POST['password']);

                    // encript the password with the old old way
                    $hashFormat = "$2y$10$";
                    $salt = "iusesomecrazystrings22";
                    $hashF_and_salt = $hashFormat . $salt;
                    $encript_password = crypt($password, $hashF_and_salt);
                    
                    if ($connection) {
                        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username','$encript_password');";
                        $result = mysqli_query($connection, $insertQuery);
                        if (!$result) {
                            die('<p>Query failed! ' . mysqli_error($connection) . '<p/>');
                        } else {
                            echo '<p class="text-lg text-emerald-500 font-bold text-center mt-10">Your account has been created!<p/>';
                        }
                    } else {
                        die('<p>Database connection failed!<p/>');
                    }
                }
            ?>
        </div>
        <!-- UPDATE FORM -->
        <div>
            <form action="index.php" method="post"
            class="flex flex-col items-center mt-10">
                <input name="username" type="text" placeholder="Username" autocomplete="off"
                class="rounded-md m-2 py-1 px-2 outline-none">
                <input name="password" type="password" placeholder="Password" autocomplete="off"
                class="rounded-md m-2 py-1 px-2 outline-none">
                <select name="id">
                    <!-- READ DATA FROM DATABASE -->
                    <?php
                        include 'db.inc.php';
                        $selectUsers = "SELECT id FROM users;";
                        $users = mysqli_query($connection, $selectUsers);
                        while ($row = mysqli_fetch_assoc($users)) {
                            $id = $row['id'];
                            echo "<option value='$id'>$id<option/>";
                        }
                    ?>
                </select>
                <button name="update" class="bg-amber-500 rounded-md text-white font-bold mt-6 py-1 px-6
                hover:brightness-110 duration-200">Update</button>
            </form>
            <?php
                if (isset($_POST['update'])) {
                    include 'db.inc.php';
                    
                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = mysqli_real_escape_string($connection, $_POST['password']);
                    $id = $_POST['id'];

                    $updateQuery = "UPDATE users SET username='$username',password='$password' WHERE id='$id';";
                    $result = mysqli_query($connection, $updateQuery);

                    if (!$result) {
                        die("Query Failed!" . mysqli_error($connection));
                    } else {
                        echo '<p class="text-lg text-emerald-500 font-bold text-center mt-10">Your information has been updated!<p/>';
                    }
                }
            ?>
        </div>
        <!-- DELETE FORM -->
        <div>
            <form action="index.php" method="post"
            class="flex flex-col items-center mt-10">
                <input name="username" type="text" placeholder="Username" autocomplete="off"
                class="rounded-md m-2 py-1 px-2 outline-none">
                <input name="password" type="password" placeholder="Password" autocomplete="off"
                class="rounded-md m-2 py-1 px-2 outline-none">
                <select name="id">
                    <?php
                        include 'db.inc.php';
                        $selectUsers = "SELECT id FROM users;";
                        $users = mysqli_query($connection, $selectUsers);
                        while ($row = mysqli_fetch_assoc($users)) {
                            $id = $row['id'];
                            echo "<option value='$id'>$id<option/>";
                        }
                    ?>
                </select>
                <button name="delete" class="bg-red-500 rounded-md text-white font-bold mt-6 py-1 px-6
                hover:brightness-110 duration-200">Delete</button>
            </form>
            <?php
                if (isset($_POST['delete'])) {
                    include 'db.inc.php';
                    
                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = mysqli_real_escape_string($connection, $_POST['password']);
                    $id = $_POST['id'];

                    $deleteQuery = "DELETE FROM users WHERE id='$id';";
                    $result = mysqli_query($connection, $deleteQuery);

                    if (!$result) {
                        die("Query Failed!" . mysqli_error($connection));
                    } else {
                        echo '<p class="text-lg text-amber-500 font-bold text-center mt-10">Your account has been deleted!<p/>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>