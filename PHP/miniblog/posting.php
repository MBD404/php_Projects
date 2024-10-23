<?php
    session_start();
    include("../DATABASE/connection.php");
    if (isset($_POST["Title"],$_POST["text"],$_POST["data"],$_POST["hour"])) 
    {
        $username = $_SESSION["nickname"];
        $path = $_SESSION["profile"];
        $id_user = $_SESSION["id"];
        $id_post = uniqid(); 
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

        $query = "INSERT INTO POSTS (id,username,title,post,PostDay,PostHour, img_path, id_user, id_post) VALUES(default,'".$username."','".$Title."','".$text."','".$data."','".$hour."','".$path."','".$id_user."', '".$id_post."',0,0,0,0)";
        $result = $mysqli->query($query) or $mysqli.die("ERRO AO INSERIR POSTAGEM : ".mysqli_error($mysqli));
        ?><script>window.location.href="./"</script><?php
    }
?>