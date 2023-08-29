<?php 
    require_once("../conexao.php");

    $email = $_POST['email-recuperar'];

    $res = $pdo->query("SELECT * FROM usuarios where email = '$email'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

    if (@count($dados) > 0) {
        //ENVIANDO A SENHA PARA O EMAIL
        $senha = $dados[0]['senha'];
        $destinatario = $email;
        $assunto = $nome_loja . ' - Recuperação de Senha';
        $mensagem = utf8_decode("Sua senha é " .$senha);
        $cabecalho = "From: ".$email;
    
        @mail($destinatario, $assunto, $mensagem, $cabecalho); //Remover o @ para permitir o erro de conexão
    
        echo "Senha Enviada para o Email Informado!";
    } else {
        echo "Email Não Encontrado! Verifique o Email Informado!";
    }
?>