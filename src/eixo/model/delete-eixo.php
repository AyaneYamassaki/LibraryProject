<?php

    // Instancia do banco de dados
    include('../../conexao/con.php');

    // Coleta do ID que será excluido do nosso banc de dados que esta sendo enviado pelo form
    $IDEIXO = $_REQUEST['IDEIXO'];

    // Criar a query para interação com o banco de dados
    $sql = "DELETE FROM EIXO WHERE IDEIXO = $IDEIXO";

    // Executar a querie
    $resultado = $pdo->query($sql);

    //Testando
    if($resultado){
        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Registro excluído com sucesso!'
        );
    } else {
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possivel excluir o registro'
        );
    }

    echo json_encode($dados);