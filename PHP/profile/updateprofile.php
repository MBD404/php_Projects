<?php
    include("../DATABASE/connection.php");
    session_start();
    $old_nickname = $_SESSION['username'];
    if (isset($_POST["nickname"])) 
    {
        $nickname = $mysqli->real_escape_string($_POST["nickname"]);
        $query2 = "UPDATE users_profile SET nickname = '$nickname' where nickname = '$old_nickname'";
        $result2 = $mysqli->query($query2) or die(mysqli_error($mysqli));
        $_SESSION['nickname'] = $nickname;
        $_SESSION['username'] = $nickname;
        ?>
        <!--<script>window.location.href="./"</script>-->
        <?php
        
    }
?>