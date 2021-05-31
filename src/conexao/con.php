<?php

    // Declarar as variáveis necessárias para gerar a minha conexão com o banco de dados....
    $hostname = "fdb21.awardspace.net";
    $dbname = "3848728_3dslibary";
    $username = "3848728_3dslibary";
    $password = "3t3cL1n5L1br4ry";

    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Conexão realizada com sucesso! Banco de Dados';
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }

