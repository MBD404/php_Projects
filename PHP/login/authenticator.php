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
            $sql = "INSERT INTO users (id,username,pass_word) VALUES(default,'".$username."','".$password."')";
            $result = $mysqli->query($sql) or $mysqli.die("ERRO AO CADASTRAR USUÁRIO : ".$mysqli->error);
            echo "Dados foram transferido com sucesso";
            ?><script>window.location.href="./"</script><?php
            
        }
    }
    if (isset($_GET["username"], $_GET["pass_word"])) 
    {
        echo "Estamos Pegando Dados";
        $username = $mysqli->real_escape_string($_GET["username"]);
        $pass_word = $mysqli->real_escape_string($_GET["pass_word"]);
        $sql = "SELECT * FROM Users WHERE username LIKE '$username' AND pass_word LIKE '$pass_word'";
        $result = $mysqli->query($sql) or $mysqli.die("".$mysqli->error);
        if ($result->num_rows > 0)
        {
            $_SESSION['username'] = $username;
            ?><script>window.location.href="http://localhost:8080/PHP/miniblog/"</script><?php
        } else {
            echo "SENHA INCORRETA POR FAVOR VERIFIQUE SUA SENHA";
        }
    } else
    {
        echo " :(";
    }
?>