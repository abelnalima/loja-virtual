<?php 
    require_once("../conexao.php");

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email-cadastrar'];
    $senha = $_POST['senha'];
    $senha_crip = md5($senha);

    if ($nome == "") {
        echo "Preencha o Campo Nome!";
        exit();
    }
    
    if ($email == "") {
        echo "Preencha o Campo Email!";
        exit();
    }

    if ($cpf == "") {
        echo "Preencha o Campo CPF!";
        exit();
    }

    if ($senha == "") {
        echo "Preencha o Campo Senha!";
        exit();
    }

    if ($senha !== $_POST['confirmar-senha']) {
        echo "As senhas são diferentes!";
        exit();
    }

    
    //ENVIANDO OS VALORES DE NOME, EMAIL, CPF, SENHA E SENHA_CRIP PARA O BANCO DE DADOS
    $res = $pdo->query("SELECT * FROM usuarios where cpf = '$_POST[cpf]'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    
    if (@count($dados) == 0) {
        $res = $pdo->prepare("INSERT into usuarios (nome, cpf, email, senha, senha_crip, nivel) values (:nome, :cpf, :email, :senha, :senha_crip, :nivel)");
        $res->bindValue(":nome", $nome);
        $res->bindValue(":cpf", $cpf);
        $res->bindValue(":email", $email);
        $res->bindValue(":senha", $senha);
        $res->bindValue(":senha_crip", $senha_crip);
        $res->bindValue(":nivel", 'Cliente');
        
        $res->execute();
        
        echo "Cadastrado com Sucesso!";
    } else {
        echo "CPF já cadastrado!";
    };
?>