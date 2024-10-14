<?php
    session_start();
    $username = $_SESSION['username']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="../miniblog/css/feed.css">
</head>
<body>
<header>
        <nav id="left">
            <img src="../imgs/php.png" alt="" srcset="">
        </nav>
        <nav id="right">
            <a href="../miniblog/posts.php">CRIE SUA POSTAGEM</a> <a href="../profile/index.php"><?php echo "$username";?></a>
        </nav>
    </header>
    <body>
        <h1><?php echo "$username"; ?></h1>
    </body>
</body>
</html>