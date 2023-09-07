<?php
require_once("../../conexao.php");
@session_start();

$pag = "produtos";

if (@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin') {
    echo "<script language='javascript'>window.location='../index.php'</script>";
}
?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block"
        href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Produto</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none"
        href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
</div>

<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Estoque</th>
                        <th>SubCategoria</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = $pdo->query("SELECT * FROM produtos order by id desc ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i = 0; $i < count($res); $i++) { //Fechamento realizado na linha 80
                        foreach ($res[$i] as $key => $value) {

                        }

                        $id = $res[$i]['id'];
                        $sub_cat = $res[$i]['id_subcategoria'];
                        $nome = $res[$i]['nome'];
                        $valor = $res[$i]['valor'];
                        $estoque = $res[$i]['estoque'];
                        $imagem = $res[$i]['imagem'];
                        $ativo = $res[$i]['ativo'];

                        //RECUPERAR O NOME DA CATEGORIA
                        $query2 = $pdo->query("SELECT * FROM sub_categorias where id = '$sub_cat'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        $nome_subCat = $res2[0]['nome'];
                        ?>

                        <tr>
                            <td>
                                <?php echo $nome ?>
                            </td>
                            <td>
                                <?php echo $valor ?>
                            </td>
                            <td>
                                <?php echo $estoque ?>
                            </td>
                            <td>
                                <?php echo $nome_subCat ?>
                            </td>
                            <td><img src="../../img/produtos/<?php echo $imagem ?>" width="50"> </td>
                            <td>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>"
                                    class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>"
                                    class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            </td>
                        </tr>
                    <?php } ?> <!-- Fechamento do FOR -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    if (@$_GET['funcao'] == 'editar') {
                        $titulo = "Editar Registro";
                        $id2 = $_GET['id'];

                        $query = $pdo->query("SELECT * FROM produtos where id = '" . $id2 . "' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        $id_categoria = $res[0]['id_categoria'];
                        $id_subCategoria = $res[0]['id_subcategoria'];
                        $id_envio = $res[0]['id_envio'];
                        $nome2 = $res[0]['nome'];
                        $descricao = $res[0]['descricao'];
                        $descricao_longa = $res[0]['descricao_longa'];
                        $valor2 = $res[0]['valor'];
                        $imagem2 = $res[0]['imagem'];
                        $estoque2 = $res[0]['estoque'];
                        $valor_frete = $res[0]['valor_frete'];
                        $keyword = $res[0]['palavra_chave'];
                        $ativo = $res[0]['ativo'];
                        $peso = $res[0]['peso'];
                        $largura = $res[0]['largura'];
                        $altura = $res[0]['altura'];
                        $comprimento = $res[0]['comprimento'];
                        $modelo = $res[0]['modelo'];
                    } else {
                        $titulo = "Inserir Registro";
                    }
                ?>

                <h5 class="modal-title" id="exampleModalLabel">
                    <?php echo $titulo ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input value="<?php echo @$nome2 ?>" type="text" class="form-control form-control-sm"
                                    id="nome-subcat" name="nome-subcat" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Categoria</label>
                                <select name="sel_categoria" id="sel_categoria" class="form-control form-control-sm">
                                    <?php
                                    if (@$_GET['funcao'] == 'editar') {
                                        $query = $pdo->query("SELECT * FROM categorias where id = '$id_categoria'");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        $nomeCategoria = $res[0]['nome'];

                                        echo "<option value='" . $id_categoria . "'>" . $nomeCategoria . "</option>";
                                    }

                                    $query2 = $pdo->query("SELECT * FROM categorias order by nome asc");
                                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                                    for ($i = 0; $i < count($res2); $i++) {
                                        foreach ($res2[$i] as $key => $value) {

                                        }

                                        if ($res2[$i]['nome'] != @$nomeCategoria) {
                                            echo "<option value='" . $res2[$i]['id'] . "'>" . $res2[$i]['nome'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="txtCat" name="txtCat" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>SubCategoria</label>
                                <span id="listar-subCat"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estoque</label>
                                <input value="<?php echo @$estoque2 ?>" type="text" class="form-control form-control-sm"
                                    id="estoque_prod" name="estoque_prod" placeholder="Quantidade">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Valor</label>
                                <input value="<?php echo @$valor2 ?>" type="text" class="form-control form-control-sm"
                                    id="valor_prod" name="valor_prod" placeholder="Valor">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo de Envio</label>
                                <select name="sel_envio" id="sel_envio" class="form-control form-control-sm">
                                    <?php
                                    if (@$_GET['funcao'] == 'editar') {
                                        $query = $pdo->query("SELECT * FROM envios where id = '$id_envio'");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        $nomeEnvio = $res[0]['tipo'];

                                        echo "<option value='" . $id_envio . "'>" . $nomeEnvio . "</option>";
                                    }

                                    $query2 = $pdo->query("SELECT * FROM envios order by tipo asc");
                                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                                    for ($i = 0; $i < count($res2); $i++) {
                                        foreach ($res2[$i] as $key => $value) {

                                        }

                                        if ($res2[$i]['tipo'] != @$nomeEnvio) {
                                            echo "<option value='" . $res2[$i]['id'] . "'>" . $res2[$i]['tipo'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ativo</label>
                                <select name="sel_ativo" id="sel_ativo" class="form-control form-control-sm">
                                    <?php
                                        if (@$_GET['funcao'] == 'editar') {
                                            echo "<option value='" . $ativo . "'>" . $ativo2 . "</option>";
                                        }

                                        if (@$ativo2 != 'Sim') {
                                            echo "<option value='Sim'>Sim</option>";
                                        }

                                        if (@$ativo2 != 'Não') {
                                            echo "<option value='Não'>Não</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input value="<?php echo @$modelo ?>" type="text" class="form-control form-control-sm"
                                    id="modelo_prod" name="modelo_prod" placeholder="Modelo">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Largura</label>
                                <input value="<?php echo @$largura ?>" type="text" class="form-control form-control-sm"
                                    id="largura_prod" name="largura_prod" placeholder="Largura">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Altura</label>
                                <input value="<?php echo @$altura ?>" type="text" class="form-control form-control-sm"
                                    id="altura_prod" name="altura_prod" placeholder="Altura">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Comprimento</label>
                                <input value="<?php echo @$comprimento ?>" type="text" class="form-control form-control-sm"
                                    id="comprimento_prod" name="comprimento_prod" placeholder="Comprimento">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Peso</label>
                                <input value="<?php echo @$peso ?>" type="text" class="form-control form-control-sm"
                                    id="peso_prod" name="peso_prod" placeholder="Modelo">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Frete Fixo</label>
                                <input value="<?php echo @$valor_frete ?>" type="text" class="form-control form-control-sm"
                                    id="valorFrete_prod" name="valorFrete_prod" placeholder="Valor Frete">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Descrição Curta <small>(até 500 caracteres)</small> </label>
                        <textarea maxlength="500" class="form-control form-control-sm" id="descricao_prod" name="descricao_prod">
                            <?php echo @$descricao ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Descrição Longa</label>
                        <textarea class="form-control form-control-sm" id="descricaoLonga_prod" name="descricaoLonga_prod">
                            <?php echo @$descricao_longa ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Palavras-Chave</label>
                        <input value="<?php echo @$keyword ?>" type="text" class="form-control form-control-sm"
                            id="keyword_prod" name="keyword_prod" placeholder="Palavras-Chave">
                    </div>

                    <div class="form-group">
                        <label>Imagem</label>
                        <input value="<?php echo @$imagem2 ?>" type="file" class="form-control-file" id="imagem"
                            name="imagem" onChange="carregarImg();">
                    </div>

                    <?php
                    if (@$imagem2 != "") {
                        ?>
                        <!-- Dentro do IF -->
                        <img src="../../img/sub-categorias/<?php echo $imagem2 ?>" width="150" height="150" id="target">
                        <?php
                    } else {
                        ?>
                        <!-- Dentro do ELSE -->
                        <img src="../../img/sub-categorias/sem-foto.jpg" width="150" height="150" id="target">
                    <?php
                    }
                    ?>
                </div>

                <div class="modal-footer">
                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                    <input value="<?php echo @$nome2 ?>" type="hidden" name="antigo" id="antigo">

                    <button type="button" id="btn-fechar" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente Excluir este Registro?</p>
                <div align="center" id="mensagem_excluir" class=""></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo @$_GET['id'] ?>" required>
                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}
?>

<?php
if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}
?>


<?php
if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}
?>

<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?= $pag ?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "Cadastrado com Sucesso!") {
                    alert(mensagem);
                    $('#btn-fechar').click();
                    window.location = "index.php?pag=" + pag;
                } else {
                    alert(mensagem);
                }
            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>
<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM END -->

<!--AJAX PARA EXCLUSÃO DOS DADOS BEGIN -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?= $pag ?>";

        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {
                    if (mensagem.trim() === 'Excluído com Sucesso!') {
                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    alert(mensagem);
                },
            })
        })
    })
</script>
<!--AJAX PARA EXCLUSÃO DOS DADOS END -->

<!--AJAX PARA LISTAR OS DADOS DA SUBCATEGORIA DE ACORDO COM A CATEGORIA SELECIONADA BEGIN -->
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementById('txtCat').value = document.getElementById('sel_categoria').value;

        listarSubCat();
    })
</script>

<script text="text/javascript">
    function listarSubCat() {
        var pag = "<?=$pag?>";

        $.ajax({
            url: pag + "/listar-subCat.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {
                $('#listar-subCat').html(result);
            }
        })
    }
</script>

<script type="text/javascript">
    $('#sel_categoria').change(function () {
        document.getElementById('txtCat').value = $(this).val();

        listarSubCat();
    })
</script>
<!--AJAX PARA LISTAR OS DADOS DA SUBCATEGORIA DE ACORDO COM A CATEGORIA SELECIONADA BEGIN -->

<!--SCRIPT PARA CARREGAR IMAGEM BEGIN -->
<script type="text/javascript">
    function carregarImg() {
        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            target.src = "";
        }
    }
</script>
<!--SCRIPT PARA CARREGAR IMAGEM END -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../../js/mascara.js"></script>

<!-- -->

<!-- FORÇANDO ORDENAMENTO VIA SQL -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>