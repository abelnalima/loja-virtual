<?php 
   require_once("../conexao.php");

   //VERIFICAR SE EXISTE CADASTRO, SE NAO CADASTRAR ADMINISTRADOR
   $res = $pdo->query("SELECT * FROM usuarios");
   $dados = $res->fetchAll(PDO::FETCH_ASSOC);

   if (@count($dados) == 0) {
      $res = $pdo->query("INSERT into usuarios (nome, cpf, email, senha, nivel) values ('Administrador', '000.000.000-00', '$email', '123', 'Admin')");
   }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login - <?php echo $nome_loja?></title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
      <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
      <script src="../js/login.js"></script>
      <script src="../js/mascara.js"></script>
      
      <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href="../css/login.css" rel="stylesheet">
      
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-5 mx-auto">
               <div id="first">
                  <div class="myform form ">
                     <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                           <h1>Login</h1>
                        </div>
                     </div>
                  <form action="" method="post" name="login">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email ou CPF</label>
                        <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Insira o seu email ou CPF">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Senha</label>
                        <input type="password" name="senha" id="senha"  class="form-control" aria-describedby="emailHelp" placeholder="Insira sua senha">
                     </div>
                     <div class="col-md-12 text-center mt-4">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                     </div>
                     <div class="form-group mt-4">
                        <small>
                           <p class="text-center">
                              Não possui cadastro?
                              <a class="text-danger" href="#" data-toggle="modal" data-target="#modalCadastro">
                                 Cadastre-se
                              </a>
                           </p>
                           <p class="text-center">
                              <a href="#" data-toggle="modal" data-target="#modalRecuperar">
                                 Recuperar Senha?
                              </a>
                           </p>
                        </small>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

<!-- Modal Cadastro Section Begin -->
<div class="modal fade" id="modalCadastro" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastre-se</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="post">
               <div class="form-group">
                  <label for="exampleInputEmail1">Nome Completo</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome e sobrenome">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu email">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">CPF</label>
                  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira seu cpf">
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira uma senha">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputPassword1">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmar-senha" name="confirmar-senha" placeholder="Insira a senha novamente">
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="button" id="btn-cadastrar" class="btn btn-info">Cadastrar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal Cadastro Section End -->

<!-- Modal Recuperar Section Begin -->
<div class="modal fade" id="modalRecuperar" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="post">
               <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu email">
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="button" id="btn-cadastrar" class="btn btn-info">Recuperar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal Recuperar Section End -->