<?php

    // Instancia do banco de dados
    include('../../conexao/con.php');

    // Coleta do ID que será excluido do nosso banc de dados que esta sendo enviado pelo form
    $IDTIPO_USUARIO = $_REQUEST['IDTIPO_USUARIO'];

    // Criar a query para interação com o banco de dados
    $sql = "DELETE FROM TIPO_USUARIO WHERE IDTIPO_USUARIO = $IDTIPO_USUARIO";

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