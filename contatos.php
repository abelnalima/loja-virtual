<?php 
    require_once("cabecalho.php")
?>

<?php 
    require_once("cabecalho-busca.php")
?>

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span>
                            <i class="fa fa-phone"></i>
                        </span>
                        <h4>Telefone</h4>
                        <p><?php echo $telefone?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span>
                            <a class="text-info target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_link ?>" title="<?php echo $whatsapp?>"><i class="fa fa-whatsapp"></i></a>
                        </span>
                        <h4>Whats App</h4>
                        <p><?php echo $whatsapp?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span>
                            <i class="fa fa-history"></i>
                        </span>
                        <h4>Horário Atendimento</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span>
                            <i class="fa fa-envelope"></i>
                        </span>
                        <h4>Email</h4>
                        <p><?php echo $email?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Deixe uma mensagem</h2>
                    </div>
                </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <input type="text" name="nome" id="nome" placeholder="Seu Nome">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input type="email" name="email" id="email" placeholder="Seu Email">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input type="text" name="telefone" id="telefone" placeholder="Seu WhatsApp">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="mensagem" id="mensagem" placeholder="Sua Mensagem"></textarea>
                        <button name="btn-enviar-email" id="btn-enviar-email" type="button" class="site-btn">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

<?php 
    require_once("rodape.php");
?>

<!-- AJAX Begin -->
<script type="text/javascript">
    $("#btn-enviar-email").click(function(event){
        event.preventDefault();
        alert("Enviando Formulário");

        $.ajax({
            url: "enviar.php",
            method: "post",
            data: $('form').serialize(), //$('form) faz referencia direta ao formulario ao qual o botao pertence
            dataType: "text",
            success: function(msg) {
                if (msg.trim() === 'Enviado com Sucesso!'.trim()) {
                    alert(msg);
                    $('#nome').val('');
                    $('#email').val('');
                    $('#telefone').val('');
                    $('#mensagem').val('');
                } else if (msg.trim() === 'Preencha o campo Nome!'.trim()) {
                    alert(msg);
                } else if (msg.trim() === 'Preencha o campo Email!'.trim()) {
                    alert(msg);
                } else if (msg.trim() === 'Preencha o campo Mensagem!'.trim()) {
                    alert(msg);
                } else {
                    alert("O Formulário não pode ser enviado! Tente novamente mais tarde!")
                }
            }
        })
    })
</script>