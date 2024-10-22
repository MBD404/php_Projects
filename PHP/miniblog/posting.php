<?php
    session_start();
    include("../DATABASE/connection.php");
    if (isset($_POST["Title"],$_POST["text"],$_POST["data"],$_POST["hour"])) 
    {
        $username = $_SESSION["nickname"];
        $path = $_SESSION["profile"];
        $Title = $mysqli->real_escape_string($_POST["Title"]);
        $text = $mysqli->real_escape_string($_POST["text"]);
        $data = $mysqli->real_escape_string($_POST["data"]);
        $hour = $mysqli->real_escape_string($_POST["hour"]);

        echo "$path";
        echo "$username";
        echo "$Title";
        echo "$text";
        echo "$data";
        echo "$hour";

        $query = "INSERT INTO POSTS (id,username,title,post,PostDay,PostHour, img_path) VALUES(default,'".$username."','".$Title."','".$text."','".$data."','".$hour."','".$path."')";
        $result = $mysqli->query($query) or $mysqli.die("ERRO AO INSERIR POSTAGEM : ".mysqli_error($mysqli));
        ?><script>window.location.href="./"</script><?php
    }
?>