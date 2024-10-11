<?php
    $hostname = "localhost";
    $bancodedados = "uploads";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $username, $password, $bancodedados);
    if ($mysqli->connect_error) {
        die("FALHA AO CONECTAR : ". $mysqli->connect_error);
    } else
    {
        echo "";
    }