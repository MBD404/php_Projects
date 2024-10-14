<?php

    include("conexao.php");
    $sql_query  = $mysqli->query("SELECT * FROM imagens") or die($mysqli->error);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="upload.php">
    <p><label for="">selecione o arquivo</label></p>
    <p><input name="arquivo" type="file"></p>
        <button name="upload" type="submit">Enviar Arquivo</button>
    </form>
    <table border="1" cellpadding="10">
        <thead>
            <th>arquivo</th>
            <th>Data de Envio</>
        </thead>
        <tbody>
        <?php
            while ($arquivo = $sql_query->fetch_assoc()){
            ?>
            <tr>
                <td><img src="<?php echo $arquivo['path']?>" alt="" style="width:50px;"></td>
                <td><a target="_blank" href="<?php echo $arquivo['path'] ?>"><?php echo $arquivo['nome'] ?></a></td>
                <td><?php echo date("d/m/Y H:i",strtotime($arquivo['Data_upload'])); ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>