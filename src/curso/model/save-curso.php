<?php

    // Obter a nossa conexão com o banco de dados
    include('../../conexao/con.php');

    // Obter os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verificação de campo obrigatórios do formulário
    if(empty($requestData['NOME'])){
// Caso a variável venha vazia eu gero um retorno de erro do mesmo
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Caso não exista campo em vazio, vamos gerar a requisição
        $IDCURSO = isset($requestData['IDCURSO']) ? $requestData['IDCURSO'] : "";
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : "";

        // Verifica se é para cadastra um nvo registro
        if($operacao == 'insert'){
            // Prepara o comando INSERT para ser executado
            try{
                $stmt = $pdo->prepare('INSERT INTO CURSO (NOME, EIXO_IDEIXO) VALUES (:nome,:eixo)');
                $stmt->execute(array(
                    ':nome' => $requestData['NOME'],
                    ':eixo' => $requestData['EIXO_IDEIXO']
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Curso cadastrado com sucesso.'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar o cadastro do curso.'
                );
            }
        } else {
            // Se minha variável operação estiver vazia então devo gerar os scripts de update
            try{
                $stmt = $pdo->prepare("UPDATE CURSO SET NOME=:nome, EIXO_IDEIXO=:eixo WHERE IDCURSO=:id");
                $stmt->execute(array(
                    ':id' => $IDCURSO,
                    ':nome' => $requestData['NOME'],
                    ':eixo' => $requestData['EIXO_IDEIXO']
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Curso atualizado com sucesso!'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar a alteração do curso.'
                );
            }
        }
    }

    // Converter um array ded dados para a representação JSON
    echo json_encode($dados);