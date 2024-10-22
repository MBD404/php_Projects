<?php
    include("../DATABASE/connection.php");
    session_start();
    $id = $_SESSION['id'];
    if (isset($_POST["nickname"])) 
    {
        $nickname = $mysqli->real_escape_string($_POST["nickname"]);
        echo "$nickname";
        $query2 = "UPDATE users_profile SET nickname = '$nickname' where id_user = '$id'";
        $result2 = $mysqli->query($query2) or die(mysqli_error($mysqli));
        $_SESSION['nickname'] = $nickname;
        ?>
            <script>window.location.href="./"</script>
        <?php
        
    }
    if (isset($_POST["bio"])) 
    {
        $bio = $mysqli->real_escape_string($_POST["bio"]);
        echo "$nickname";
        $query2 = "UPDATE users_profile SET bio = '$bio' where id_user = '$id'";
        $result2 = $mysqli->query($query2) or die(mysqli_error($mysqli));
        ?>
            <script>window.location.href="./"</script>
        <?php
        
    }
    if (isset($_FILES['arquivo']))
    {
        $arquivo = $_FILES["arquivo"];
        $pasta = "../arquivos/";
        echo $pasta;
        $nomeDoarquivo = $arquivo["name"];
        echo $nomeDoarquivo;
        $novoname = uniqid();
        $extensao = strtolower(pathinfo($nomeDoarquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");
        $path = $pasta . $novoname . "." . $extensao;
        echo  $path;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
        if ($deu_certo)
        {
            $mysqli->query("UPDATE profile_img SET img_path = '$path' where id_img = '$id'") or die($mysqli->error);
            $_SESSION['profile'] = $path;
            header("Location: /php/profile");
        } else{
            echo "<p>FALHA</p>";
        }
    }
?>