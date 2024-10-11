<?php

    include("conexao.php");
    if (isset($_FILES['arquivo']))
    {
        $arquivo = $_FILES["arquivo"];
        if ($arquivo["error"])
            die("Falha ao enviar arquivo");
        if ($arquivo["size"] > 5000000)
            die("ARQUIVO MUITO GRANDE!!! MAXIMO 5 MB");

        $pasta = "arquivos/";
        $nomeDoarquivo = $arquivo["name"];
        $novoname = uniqid();
        $extensao = strtolower(pathinfo($nomeDoarquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");
        $path = $pasta . $novoname . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
        if ($deu_certo)
        {
            $mysqli->query("INSERT INTO arquivos (nome,path) VALUES('$nomeDoarquivo','$path')") or die($mysqli->error);
            echo "<p>Arquivo enviado com sucesso : <a href='arquivos/$novoname.$extensao'> aqui </a></p>";
            header("Location: http://localhost:8080/PHP/profile/");
        } else{
            echo "<p>FALHA</p>";
        }
        
        
    }
    