<?php 
    require_once("../../../conexao.php");

    $tipo = $_POST['tipo-envio'];

    $antigo = $_POST['antigo'];
    $id = $_POST['txtid2'];

    if ($tipo === "") {
        echo "Preencha o Campo Tipo de Envio!";
        exit();
    }

    if ($tipo != $antigo) {
        $res = $pdo->query("SELECT * FROM envios where tipo = '$tipo'");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    
        if (@count($dados) > 0) {
            echo "Tipo de Envio já Cadastrado!";
            exit();
        }
    }

    //VERIFICANDO E ENVIANDO PARA O BANCO DE DADOS
    if ($id === "") {
        $res = $pdo->prepare("INSERT INTO envios (tipo) VALUES (:tipo)");
    } else {
        $res = $pdo->prepare("UPDATE envios SET tipo = :tipo WHERE id = :id");
        
        $res->bindValue(":id", $id);
    }

    $res->bindValue(":tipo", $tipo);

    $res->execute();

    echo "Cadastrado com Sucesso!";
?>