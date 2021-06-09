<?php

    // Declarar as variáveis necessárias para gerar a minha conexão com o banco de dados....
    $hostname = "localhost";
    $dbname = "id16995102_library3dsetecayanebd";
    $username = "id16995102_library3dsetecayane";
    $password = "*Etec3DSL1br4ryAyane";

    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Conexão realizada com sucesso! Banco de Dados';
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }

