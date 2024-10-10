<?php
    session_start();
    include("../DATABASE/connection.php");
    if (isset($_POST["Title"],$_POST["text"],$_POST["data"],$_POST["hour"])) 
    {
        $username = $_SESSION["username"];
        $Title = $mysqli->real_escape_string($_POST["Title"]);
        $text = $mysqli->real_escape_string($_POST["text"]);
        $data = $mysqli->real_escape_string($_POST["data"]);
        $hour = $mysqli->real_escape_string($_POST["hour"]);

        echo "$username";
        echo "$Title";
        echo "$text";
        echo "$data";
        echo "$hour";

        $query = "INSERT INTO POSTS (id,username,title,post,PostDay,PostHour) VALUES(default,'".$username."','".$Title."','".$text."','".$data."','".$hour."')";
        $result = $mysqli->query($query) or $mysqli.die("ERRO AO INSERIR POSTAGEM : ".mysqli_error($mysqli));
        ?><script>window.location.href="./"</script><?php
    }
?>