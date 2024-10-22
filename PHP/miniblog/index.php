<?php
    include("../DATABASE/connection.php");
    session_start(); 
    $username = $_SESSION['nickname'];
    $profile = $_SESSION['profile'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MAIN</title>
    <link rel="stylesheet" href="css/feed.css">
    <style>
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
        #profile > img
        {
            border: 1px solid;
            border-radius: 50px;
            width: 60px;
            height: 60px;
            margin: 1vh 0;
        }
    </style>
</head>
<body>
    <header>
        <nav id="left">
            <img src="../imgs/php.png" alt="" srcset="" onclick=" window.location.href = '/PHP/miniblog' ">
        </nav>
        <nav id="right">
            <a href="posts.php">CRIE SUA POSTAGEM</a> <a href="../profile/index.php"><?php echo "$username";?></a><img src="<?php echo "$profile" ?>" class="imgprofile" alt="">
        </nav>
    </header>
    <main>
        <aside><h1>BEM-VINDO(A) ao Feed da festa, Faça sua postagem e interaja com a postagem dos outros :D</h1></aside>
    </main>
    <section>
        <?php
            $sqlcode = "SELECT * FROM POSTS ORDER BY id DESC";
            $query = $mysqli->query($sqlcode) or die("ERRO AO CONSULTAR : ". $mysqli->error);
            if ($query->num_rows == 0)
            {
                ?>
                    <h1>SEM NENHUMA POSTAGEM AINDA :'(</h1>
                <?php
            } 
            else 
            {
                while ($row = $query->fetch_assoc()) 
                {
                    ?>
                    <article id="post-box">
                        <div id="post-header">
                            <div id="profile"><img src="<?php echo ''.$row["img_path"].'' ?>" alt=""></div>
                            <div id="username"><h2><?php echo $row['username']; ?></h2></div>
                            <div id="date"><div id="hour"><?php echo $row['PostHour']; ?></div><div id="day"><?php echo $row['PostDay']; ?></div></div>
                        </div>
                        
                        <aside id="post-content">
                            <h1 id="Tittle"><?php echo $row['title']; ?></h1>
                            <div id="text">
                            <?php echo $row['post']; ?>
                            </div>
                        </aside>
                    </article>
                    <?php
                }
            }
        ?>
    </section>
</body>
</html>