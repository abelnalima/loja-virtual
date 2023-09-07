<?php 
    require_once("../../../conexao.php");

    $nome = $_POST['nome-subcat'];
    $id_cat = $_POST['categoria'];

    $nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($nome)), 
                    utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

    $nome_url = preg_replace('/[ -]+/' , '-' , $nome_novo);

    $antigo = $_POST['antigo'];
    $id = $_POST['txtid2'];

    if ($nome === "") {
        echo "Preencha o Campo Nome!";
        exit();
    }

    if ($nome != $antigo) {
        $res = $pdo->query("SELECT * FROM sub_categorias where nome = '$nome'");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    
        if (@count($dados) > 0) {
            echo "Sub-Categoria já Cadastrada!";
            exit();
        }
    }

    //SCRIPT PARA SUBIR FOTO NO BANCO
    $caminho = '../../../img/sub-categorias/' .@$_FILES['imagem']['name'];

    if (@$_FILES['imagem']['name'] == "") {
        $imagem = "sem-foto.jpg";
    } else {
        $imagem = @$_FILES['imagem']['name']; 
    }

    $imagem_temp = @$_FILES['imagem']['tmp_name']; 
    $ext = pathinfo($imagem, PATHINFO_EXTENSION);

    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif') { 
        move_uploaded_file($imagem_temp, $caminho);
    } else {
        echo 'Extensão de Imagem não permitida!';
        exit();
    }

    //VERIFICANDO E ENVIANDO PARA O BANCO DE DADOS
    if ($id === "") {
        $res = $pdo->prepare("INSERT INTO sub_categorias (id_categoria, nome, nome_url, imagem) VALUES (:id_categoria, :nome, :nome_url, :imagem)");
        $res->bindValue(":imagem", $imagem);
    } else {
        if ($imagem === "sem-foto.jpg") {
            $res = $pdo->prepare("UPDATE sub_categorias SET id_categoria = :id_categoria, nome = :nome, nome_url = :nome_url WHERE id = :id");
        } else {
            $res = $pdo->prepare("UPDATE sub_categorias SET id_categoria = :id_categoria, nome = :nome, nome_url = :nome_url, imagem = :imagem WHERE id = :id");
            $res->bindValue(":imagem", $imagem);
        }

        $res->bindValue(":id", $id);
    }

    $res->bindValue(":id_categoria", $id_cat);
    $res->bindValue(":nome", $nome);
    $res->bindValue(":nome_url", $nome_url);

    $res->execute();

    echo "Cadastrado com Sucesso!";
?>