<?php 
    require_once("../../../conexao.php");

    $id = $_POST['id'];

    $pdo->query("DELETE from envios WHERE id = '$id'");

    echo "Excluído com Sucesso!";
?>