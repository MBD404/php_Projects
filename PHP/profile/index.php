<?php
    session_start();
    include("../DATABASE/connection.php");
    $nickname = $_SESSION['nickname'];
    $username = $_SESSION['username'];
    $profile = $_SESSION['profile'];
    $id = $_SESSION['id'];
    $img_profile;
    $sql_img = "SELECT img_path FROM users u JOIN profile_img p ON u.id = p.id_img WHERE id = '$id'";
    $result = $mysqli->query( $sql_img);
    while ($row = $result->fetch_assoc())
    {
        $get_img = $row['img_path'];
    }
    $_SESSION['profile'] = $get_img;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="../miniblog/css/feed.css">
    <style>
        .modal {
            width: 400px;
            height: 200px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            }
        #profile-img
        {
            border: 3px solid;
            width: 150px;
            height: 150px;
            border-radius: 100px;
        }
        .imgprofile
        {
            width: 50px;
            height: 50px;
            border: 2px solid;
            border-radius: 100px;
        }
        #right > a 
        {
            margin: 2.5vh 1vw;
        }
        #right
        {
            margin-left: auto;
            height: 10px;
            padding: 0 10vh;
            display: flex;
        }
    </style>
</head>
<body>
    <header>
    <nav id="left">
            <img src="../imgs/php.png" alt="" srcset="" onclick=" window.location.href = '/PHP/miniblog' ">
        </nav>
        <nav id="right">
            <a href="posts.php">CRIE SUA POSTAGEM</a> <a href="../profile/index.php"><?php echo "$nickname";?></a><img src="<?php echo "$profile" ?>" class="imgprofile" alt="">
        </nav>
    </header>
    <hr>
    <body>
        <img id="profile-img" onclick="document.getElementById('modal-img').showModal()" src="<?php echo "$get_img" ?>" alt="" srcset="">
        <dialog id="modal-img" class="modal">
            <!-- Conteúdo do modal -->
            <button onclick="document.getElementById('modal-img').close()">X</button>
            <form enctype="multipart/form-data" method="post" action="updateprofile.php">
                <h2>Gostaria de mudar a sua foto de perfil??</h2>
                <input name="arquivo" type="file"> 
                <input type="submit" value="enviar">
            </form>
        </dialog>
        <h1><?php echo "$nickname"; ?></h1> <h3 id="real-name"></h3><a onclick="document.getElementById('modal-name').showModal()">mudar nome</a>
        
        <dialog id="modal-name" class="modal">
            <!-- Conteúdo do modal -->
            <button onclick="document.getElementById('modal-name').close()">X</button>
            <form method="post" action="updateprofile.php">
                <h2>Gostaria de mudar o seu nickname?</h2>
                <input name="nickname" type="text">
                <input type="submit" value="enviar">
            </form>
        </dialog>
        <hr>
        <h1>BIO</h1>
        <p>
            <?php
                $sqlcode = "SELECT bio FROM users u JOIN users_profile p ON u.id = p.id_user WHERE nickname = '$nickname'";
                $result = $mysqli->query( $sqlcode);
                while ($row = $result->fetch_assoc())
                {
                    echo $row['bio'];
                }
             ?>
        </p>
        <a onclick="document.getElementById('modal-bio').showModal()">Mudar a bio</a>
        <dialog id="modal-bio" class="modal">
            <!-- Conteúdo do modal -->
            <button onclick="document.getElementById('modal-bio').close()">X</button>
            <form method="post" action="updateprofile.php">
                <h2>Gostaria de mudar a sua bio?</h2>
                <textarea name="bio"></textarea>
                <input type="submit" value="enviar">
            </form>
        </dialog>
        <script>
            if ('<?php echo "$nickname"; ?>' != '<?php echo "$username" ?>' )
            {
                document.getElementById('real-name').innerText = "@<?php echo "$username" ?>"
            }
        </script>
    </body>
</body>
</html>