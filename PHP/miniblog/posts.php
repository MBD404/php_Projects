<?php
include("../DATABASE/connection.php");
session_start();
$username = $_SESSION['username']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - POST</title>
</head>
<body>
    <main>
        <form method="post" action="posting.php">
            <?php echo "<h1>Olá $username! no que está pensando?</h1>";?>
            <p>titulo:</p>
            <input type="text" required name="Title">
            <p>Texto:</p>
            <textarea required name="text" id=""></textarea> <hr>
            <input type="hidden" name="data" id="date">
            <input type="hidden" name="hour" id="hour">
            <button type="submit">Postar!</button>
        </form>
    </main>
    <script src="script.js"></script>
</body>
</html>