<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Built-in Functions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
    <div class="flex space-x-5 text-center p-4">
        <div class="text-lg">
            <h3 class="text-xl font-bold">Math Functions:</h3>
            <?php
            echo pow(2, 7) . '<br/>';
            echo rand(1, 10) . '<br/>';
            echo sqrt(100) . '<br/>';
            echo ceil(4.6) . '<br/>';
            echo floor(4.6) . '<br/>';
            echo round(4.6) . '<br/>';
            echo round(4.3) . '<br/>';
            // Much much more in the docs...
            ?>
        </div>
        <div class="text-lg">
            <h3 class="text-xl font-bold">String Functions:</h3>
            <?php
            $string = "Hello student!";
            echo strlen($string) . '<br/>';
            echo strtoupper($string) . '<br/>';
            echo strtolower($string) . '<br/>';
            // Much much more in the docs...
            ?>
        </div>
        <div class="text-xl">
            <h3 class="text-xl font-bold">Array Functions:</h3>
            <?php
            $numbers = [65, 123, 10, 20, 52];
            $list = ['banana', 'manga', 'kiwi'];
            echo max($numbers) . '<br/>';
            echo min($numbers) . '<br/>';
            echo sort($numbers) . '<br/>';
            // Much much more in the docs...
            ?>
        </div>
    </div>
</body>
</html>