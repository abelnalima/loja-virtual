<?php
    require_once("../../conexao.php");
    @session_start();

    $pag = "envios";

    if (@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin') {
        echo "<script language='javascript'>window.location='../index.php'</script>";
    }
?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block"
        href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Envio</a>
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
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $query = $pdo->query("SELECT * FROM envios order by tipo asc ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i = 0; $i < count($res); $i++) { //Fechamento realizado na linha 64
                            foreach ($res[$i] as $key => $value) {

                            }

                            $nome = $res[$i]['tipo'];
                            $id = $res[$i]['id'];
                    ?>

                        <tr>
                            <td><?php echo $nome ?></td>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    if (@$_GET['funcao'] == 'editar') {
                        $titulo = "Editar Registro";
                        $id2 = $_GET['id'];

                        $query = $pdo->query("SELECT * FROM envios where id = '" . $id2 . "' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        $nome2 = $res[0]['tipo'];
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
                    <div class="form-group">
                        <label>Tipo de Envio</label>
                        <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="tipo-envio" name="tipo-envio" placeholder="Tipo de Envio">
                    </div>
                </div>

                <div class="modal-footer">
                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                    <input value="<?php echo @$nome2 ?>" type="hidden" name="antigo" id="antigo">

                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
        var pag = "<?=$pag?>";
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
                    window.location = "index.php?pag="+pag;
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