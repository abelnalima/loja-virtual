<?php 
    require_once("../../../conexao.php");

    $id_categoria = $_POST['sel_categoria'];
    $id_subCategoria = $_POST['sel_subCategoria'];
    $id_envio = $_POST['sel_envio'];
    $ativo = $_POST['sel_ativo'];
    $nome = $_POST['nome-prod'];
    $estoque = $_POST['estoque_prod'];
    $valor = $_POST['valor_prod'];
    $modelo = $_POST['modelo_prod'];
    $largura = $_POST['largura_prod'];
    $altura = $_POST['altura_prod'];
    $comprimento = $_POST['comprimento_prod'];
    $peso = $_POST['peso_prod'];
    $valorFrete = $_POST['valorFrete_prod'];
    $descricao = $_POST['descricao_prod'];
    $descricaoLonga = $_POST['descricaoLonga_prod'];
    $keyword = $_POST['keyword_prod'];

    $nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($nome)), 
                    utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

    $nome_url = preg_replace('/[ -]+/' , '-' , $nome_novo);

    $antigo = $_POST['antigo'];
    $id = $_POST['txtid2'];

    if ($nome === "") {
        echo "Preencha o Campo Nome!";
        exit();
    }

    /*if ($nome != $antigo) {
        $res = $pdo->query("SELECT * FROM sub_categorias where nome = '$nome'");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    
        if (@count($dados) > 0) {
            echo "Sub-Categoria já Cadastrada!";
            exit();
        }
    }*/

    //SCRIPT PARA SUBIR FOTO NO BANCO
    $caminho = '../../../img/produtos/' .@$_FILES['imagem']['name'];

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
        $res = $pdo->prepare("INSERT INTO produtos (id_categoria, id_subcategoria, id_envio, nome, nome_url, descricao, descricao_longa, valor, imagem, estoque, valor_frete, 
                            palavra_chave, ativo, peso, largura, altura, comprimento, modelo) VALUES (:id_categoria, :id_subcategoria, :id_envio, :nome, :nome_url, :descricao, :descricao_longa, 
                            :valor, :imagem, :estoque, :valor_frete, :palavra_chave, :ativo, :peso, :largura, :altura, :comprimento, :modelo)");

        $res->bindValue(":imagem", $imagem);
    } else {
        if ($imagem === "sem-foto.jpg") {
            $res = $pdo->prepare("UPDATE produtos SET id_categoria = :id_categoria, id_subcategoria = :id_subcategoria, id_envio = :id_envio, nome = :nome, nome_url = :nome_url, 
                                descricao = :descricao, descricao_longa = :descricao_longa, valor = :valor, estoque = :estoque, valor_frete = :valor_frete, 
                                palavra_chave = :palavra_chave, ativo = :ativo, peso = :peso, largura = :largura,  = :altura, comprimento = :comprimento, modelo = :modelo WHERE id = :id");
        } else {
            $res = $pdo->prepare("UPDATE produtos SET id_categoria = :id_categoria, id_subcategoria = :id_subcategoria, id_envio = :id_envio, nome = :nome, nome_url = :nome_url, 
                                descricao = :descricao, descricao_longa = :descricao_longa, valor = :valor, imagem = :imagem, estoque = :estoque, valor_frete = :valor_frete, 
                                palavra_chave = :palavra_chave, ativo = :ativo, peso = :peso, largura = :largura,  = :altura, comprimento = :comprimento, modelo = :modelo WHERE id = :id");
            $res->bindValue(":imagem", $imagem);
        }

        $res->bindValue(":id", $id);
    }

    $res->bindValue(":id_categoria", $id_categoria);
    $res->bindValue(":id_subcategoria", $id_subCategoria);
    $res->bindValue(":id_envio", $id_envio);
    $res->bindValue(":ativo", $ativo);
    $res->bindValue(":nome", $nome);
    $res->bindValue(":nome_url", $nome_url);
    $res->bindValue(":estoque", $estoque);
    $res->bindValue(":valor", $valor);
    $res->bindValue(":modelo", $modelo);
    $res->bindValue(":largura", $largura);
    $res->bindValue(":altura", $altura);
    $res->bindValue(":comprimento", $comprimento);
    $res->bindValue(":peso", $peso);
    $res->bindValue(":valor_frete", $valorFrete);
    $res->bindValue(":descricao", $descricao);
    $res->bindValue(":descricao_longa", $descricaoLonga);
    $res->bindValue(":palavra_chave", $keyword);

    $res->execute();

    echo "Cadastrado com Sucesso!";
?>