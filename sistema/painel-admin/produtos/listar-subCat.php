<?php 
    require_once("../../../conexao.php");

    $nomeCat = $_POST['txtCat'];

    echo "<select class='sm-width form-control form-control-sm' name='sel_subCategoria' id='sel_subCategoria'>";

    $res = $pdo->query("SELECT * FROM sub_categorias where id_categoria = $nomeCat");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < count($dados); $i++) {
        foreach ($dados[$i] as $key => $value) {

        }

        echo "<option value='" . $dados[$i]['id'] . "'>" . $dados[$i]['nome'] . "</option>";
    }
?>