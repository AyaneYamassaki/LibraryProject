<?php

// conexão com o banco de dados
    include('../../conexao/con.php');

    // criar variável array que receberá toda a consulta do banco de dados
    $dados = array();

    // Query de consulta do banco de dados
    $sql = "SELECT * FROM USUARIO WHERE NOME LIKE '%".$_REQUEST['NOME']."%' ORDER BY NOME DESC";

    // Executar a query
    $resultado = $pdo->query($sql);

    // Verificação do retorno da consulta
    if($resultado){
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    // Retorno JSON
    echo json_encode($dados);