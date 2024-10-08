<?php
    include("../DATABASE/connection.php");
    $name = $mysqli->real_escape_string($_POST["name"]);
    $sql = "INSERT INTO peoples (id,Nome) VALUES (default, '$name')";
    $result = $mysqli->query($sql) or die("ERRO AO INSERIR - ".$mysqli->error);
?>

<script>
    window.window.location.href = "http://localhost:8080/PHP/inserirdados/index.html?name="
</script>

