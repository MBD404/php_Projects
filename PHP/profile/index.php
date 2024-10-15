<?php
    session_start();
    include("../DATABASE/connection.php");
    $nickname = $_SESSION['nickname'];
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="../miniblog/css/feed.css">
    <style>
        #modal {
            width: 400px;
            height: 200px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            }
    </style>
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
        <h1><?php echo "$nickname"; ?></h1> <a onclick="document.getElementById('modal').showModal()">mudar nome</a>
        <h2 id="real-name"></h2>
        <dialog id="modal">
            <!-- Conteúdo do modal -->
            <button onclick="document.getElementById('modal').close()">X</button>
            <form method="post" action="updateprofile.php">
                <h2>Gostaria de mudar o seu nickname?</h2>
                <input name="nickname" type="text">
                <input type="submit" value="enviar">
            </form>
        </dialog>
        <script>
            if ('<?php echo "$nickname"; ?>' != '<?php echo "$username" ?>' )
            {
                document.getElementById('real-name').innerText = "<?php echo "$username" ?>"
            }
        </script>
    </body>
</body>
</html>