<?php
    session_start();
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$username" ?> - profile</title>
    <link rel="stylesheet" href="../css/feed.css">
</head>
<body>
    <header>
        <nav id="left">
            <img src="" alt="" srcset="">
        </nav>
        <nav id="right">
            <a href="posts.php">CRIE SUA POSTAGEM</a> <a href=""><?php echo "$username";?></a>
        </nav>
    </header>
    <body>
        
    </body>
</body>
</html>