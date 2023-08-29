<?php 
    require_once("../../conexao.php");

    $nome = $_POST['nome-perfil'];
    $cpf = $_POST['cpf-perfil'];
    $email = $_POST['email-perfil'];
    $senha = $_POST['senha-perfil'];
    $senha_crip = md5($_POST['senha-perfil']);
    $confirmar_senha = $_POST['confirmar-senha-perfil'];

    $antigo = $_POST['antigo'];
    $id = $_POST['txtid'];

    if ($nome === "") {
        echo "Preencha o Campo Nome!";
        exit();
    }

    if ($cpf === "") {
        echo "Preencha o Campo CPF!";
        exit();
    }

    if ($email === "") {
        echo "Preencha o Campo Email!";
        exit();
    }

    if ($senha === "") {
        echo "Preencha o Campo Senha!";
        exit();
    }

    if ($confirmar_senha === "") {
        echo "Preencha o Campo Confirmar Senha!";
        exit();
    }

    if ($senha !== $confirmar_senha) {
        echo "As senhas são diferentes! Verifique as senhas informadas!";
        exit();
    }

    if ($cpf != $antigo) {
        $res = $pdo->query("SELECT * FROM usuarios where cpf = '$cpf'");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    
        if (@count($dados) > 0) {
            echo "CPF já Cadastrado!";
            exit();
        }
    }

    $res = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, senha_crip = :senha_crip WHERE id = :id");
    $res->bindValue(":nome", $nome);
    $res->bindValue(":cpf", $cpf);
    $res->bindValue(":email", $email);
    $res->bindValue(":senha", $senha);
    $res->bindValue(":senha_crip", $senha_crip);
    $res->bindValue(":id", $id);
    
    $res->execute();

    echo "Dados Atualizados com Sucesso!";
?>