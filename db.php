<?php

    $dbname = "moviestar";
    $host = "localhost";
    $user = "root";
    $pass = "1234";

    $conn = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $pass);

    //HABILITAR ERROS PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


?>