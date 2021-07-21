<?php

    // Inclusão do banco de dados
    include('../../conexao/con.php');

    // Executo a recepção do id a ser buscado no banco de dados
    $IDCURSO = $_REQUEST['IDCURSO'];

    // Gero a querie de consulta no banco de dados
    $sql = "SELECT * FROM CURSO WHERE IDCURSO = $IDCURSO";

    // Executar nossa querie de consulta ao banco de dados
    $resultado = $pdo->query($sql);

    // Testar a minha consulta de banco de dados
    if($resultado){
        $dadosCurso = array();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dadosCurso = array_map(null, $row);
        }
        $dados = array(
            'tipo' => 'success',
            'mensagem' => '',
            'dados' => $dadosCurso
        );
    } else {
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possível obter o registro solicitado.',
            'dados' => array()
        );
    }

    echo json_encode($dados);