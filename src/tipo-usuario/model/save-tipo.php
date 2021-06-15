<?php

    // Obter a nossa conexão com o banco de dados
    include('../../conexao/con.php');

    // Obter os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verificação de campo obrigatórios do formulário
    if(empty($requestData['DESCRICAO'])){
// Caso a variável venha vazia eu gero um retorno de erro do mesmo
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Caso não exista campo em vazio, vamos gerar a requisição
        $IDTIPO_USUARIO = isset($requestData['IDTIPO_USUARIO']) ? $requestData['IDTIPO_USUARIO'] : "";
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : "";

        // Verifica se é para cadastra um nvo registro
        if($operacao == 'insert'){
            // Prepara o comando INSERT para ser executado
            try{
                $stmt = $pdo->prepare('INSERT INTO TIPO_USUARIO (DESCRICAO) VALUES (:descricao)');
                $stmt->execute(array(
                    ':descricao' => $requestData['DESCRICAO']
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Tipo de usuário cadastrado com sucesso.'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar o cadastro deste tipo de usuário.'
                );
            }
        } else {
            // Se minha variável operação estiver vazia então devo gerar os scripts de update
            try{
                $stmt = $pdo->prepare("UPDATE TIPO_USUARIO SET DESCRICAO=:descricao WHERE IDTIPO_USUARIO=:id");
                $stmt->execute(array(
                    ':id' => $IDTIPO_USUARIO,
                    ':descricao' => $requestData['DESCRICAO']
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Tipo de usuário atualizado com sucesso!'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar a alteração deste tipo de usuário.'
                );
            }
        }
    }

    // Converter um array ded dados para a representação JSON
    echo json_encode($dados);