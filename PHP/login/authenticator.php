<?php
    session_start();
    include("../DATABASE/connection.php");
    if (isset($_POST["username"] , $_POST["password"]))
    {
        $username = $mysqli->real_escape_string($_POST["username"]);
        $password = $mysqli->real_escape_string($_POST["password"]);
        if ($username == "" or $password == "")
        {
            ?><script>window.location.href="registrar.html"</script><?php
        }else 
        {
            $sql1 = "INSERT INTO users (username, pass_word) values ( '".$username."', '".$password."')";
            $sql2 = "INSERT INTO users_profile (id_user, nickname, bio) values(default,'".$username."','Hello World im Newbie and this is my Bio')";
            $result = $mysqli->query($sql1) or $mysqli.die("ERRO AO CADASTRAR USUÁRIO : ".$mysqli->error);
            $result1 = $mysqli->query($sql2) or $mysqli.die("ERRO AO CADASTRAR USUÁRIO : ".$mysqli->error);
            echo "Dados foram transferido com sucesso";
            ?><script>window.location.href="./"</script><?php     
        }
    }
    if (isset($_GET["username"], $_GET["pass_word"])) {
        echo "Estamos Pegando Dados";
        $username = $mysqli->real_escape_string($_GET["username"]);
        $pass_word = $mysqli->real_escape_string($_GET["pass_word"]);
        $sql1 = "SELECT * FROM users u JOIN users_profile p ON u.id = p.id_user WHERE username LIKE '$username' AND pass_word LIKE '$pass_word'";
        $result = $mysqli->query($sql1) or $mysqli.die("".$mysqli->error);
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $_SESSION['nickname'] = $row['nickname'];
                $_SESSION['username'] = $row['username'];
            }
            ?>
            <script>window.location.href="/PHP/miniblog/"</script>
            <?php
        } else {
            echo "SENHA INCORRETA POR FAVOR VERIFIQUE SUA SENHA";
        }
    } else {
        echo " :(";
    }
?>