<?php
    require_once("conexao.php");

    if ($_POST['nome'] == "") {
        echo 'Preencha o campo Nome!';
        exit();
    }

    if ($_POST['email'] == "") {
        echo 'Preencha o campo Email!';
        exit();
    }

    if ($_POST['mensagem'] == "") {
        echo 'Preencha o campo Mensagem!';
        exit();
    }

    $destinatario = $email;
    $assunto = $nome_loja . ' - Email da Loja';

    $mensagem = utf8_decode('Nome: ' .$_POST['nome'] ."\r\n" ."\r\n" .'Telefone: ' .$_POST['telefone']
                ."\r\n" ."\r\n" .'Mensagem: '.$_POST['mensagem']);

    $cabecalho = "From: ".$_POST['email'];

    mail($destinatario, $assunto, $mensagem, $cabecalho); //Remover o @ para permitir o erro de conexão

    echo 'Enviado com Sucesso!';

    //ENVIANDO OS VALORES DE NOME E EMAIL PARA O BANCO DE DADOS
    $res = $pdo->query("SELECT * FROM emails where email = '$_POST[nome]'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

    if (@count($dados) == 0) {
        $res = $pdo->prepare("INSERT into emails (nome, email, ativo) values (:nome, :email, :ativo)");
        $res->bindValue(":nome", $_POST['nome']);
        $res->bindValue(":email", $_POST['email']);
        $res->bindValue(":ativo", "Sim");
        $res->execute();
    }
?>