
<?php
    $hostname = "localhost";
    $bancodedados = "posto";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $username, $password, $bancodedados);
    if ($mysqli->connect_error) {
        die("FALHA AO CONECTAR : ". $mysqli->connect_error);
    } else
    {
        echo "CONECTADO COM SUCESSO";
    }

    $data ="";
    $html_h1 = "<h1> Este é meu primeiro Html montado a partir do php</h1>";
    $html_hr = '<hr>';
    $html_input = '<input type="text" value="' . htmlspecialchars($data) . '" />'."\n";
    $html_button = '<button >clicar</button>';
    $JS = "<script> console.log('Hello World') </script>";
    echo $html_hr;
    echo $html_h1;
    echo $html_input;
    echo $JS;

?>