
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agora este arquivo está mais APTO para ser uma pagina em HTML</h1>
    <h3>a carinha feliz reprsenta sucesso na conexão ao banco de dados MySQL</h3>
    <?php
        $hostname = "localhost";
        $bancodedados = "party";
        $username = "root";
        $password = "";

        $mysqli = new mysqli($hostname, $username, $password, $bancodedados);
        if ($mysqli->connect_error) {
            die("FALHA AO CONECTAR : ". $mysqli->connect_error);
        } else
        {
            echo ":)";
        }
    ?>
</body>
</html>

