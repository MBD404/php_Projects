<?php 
session_start();
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1
        {
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <?php echo "<h1>PARABENS $username !!!</h1>"?>
    <img src="sucess/cake.png" alt="" srcset="">
    <h1>BEM-VINDO A FESTA!!!</h1>
    <p>Esta pagina ainda está em desenvolvimento, pegue o seu bolo e aguarde a finalização dela :)</p>
</body>
</html>