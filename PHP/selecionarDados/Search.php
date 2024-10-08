<?php
    include("../DATABASE/connection.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Nomes</title>
</head>
<body>
    <h1>PAGINA DE ADMINISTRAÇÃO DE FESTAS</h1>
    <h2>Seja bem-vindo</h2>
    <form action="">
        <input name="Nome" placeholder="Digite o nome do participante ou id" type="text"> <br>
        <button type="submit">Pesquisar</button>
    </form>
    <button onclick="window.location.href='../index.html'">voltar</button>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>ID</th>
            <th>NOME</th>
        </tr>
        <?php
        if (!isset($_GET["Nome"])) {
            ?>
        <tr>    
            <td colspan="2">Digite o nome ou ID</tr>
        </tr>
        <?php 
        } else {
            $search = $mysqli->real_escape_string($_GET["Nome"]);
            $sqlcode = "SELECT * FROM peoples WHERE id LIKE '%$search%' OR Nome LIKE '%$search%'";
            $query = $mysqli->query($sqlcode) or die("ERRO AO CONSULTAR : ". $mysqli->error);

            if ($query->num_rows == 0) {
            ?>
            <tr>
                <td colspan="2">Erro 404</td>
            </tr>
        <?php
            } else {
                while ($row = $query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['Nome'];?></td>
                    </tr>
                    <?php
                }
            }?>
        <?php
        }
        ?>
    </table>
</body>
</html>