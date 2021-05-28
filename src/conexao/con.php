<?php

    // Declarar as variáveis necessárias para gerar a minha conexão com o BD...
    $hostname = "fdb21.awardspace.net";
    $dbname = "3848728_library3ds";
    $username = "3848728_library3ds";
    $password = "3t3cl1n5";

    try{
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Conexao realizada com sucesso!';
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }