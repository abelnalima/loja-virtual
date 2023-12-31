<?php 
    require_once("config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vendas de roupas masculina e feminina">
    <meta name="keywords" content="botas masculinas, roupas femininas">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $nome_loja ?></title>

    <!-- FAV Icon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
    <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
    <script src="js/mascara.js"></script>

</head>

<body>
    <!-- Page Preloder 
    <div id="preloder">
        <div class="loader"></div>
    </div>-->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="carrinho.php"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
            <div class="header__top__right__auth ml-4">
                <a href="sistema"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <div class="humberger__menu__widget">
            
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Início</a></li>
                <li><a href="./categorias.php">Categorias</a></li>
                <li><a href="#">Produtos</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./produtos.php">Produtos</a></li>
                        <li><a href="./lista-produtos.php">Lista de Produtos</a></li>
                        <li><a href="./promocoes.php">Promoções</a></li>
                        <li><a href="./combos.php">Combos</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contatos.php">Contatos</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
            <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
            <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_link ?>" title="<?php echo $whatsapp?>"><i class="fa fa-whatsapp"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <?php echo $email ?></li>
                <li> <?php echo $texto_destaque ?> </li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo $email ?></li>
                                <li><?php echo $texto_destaque ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#" title="Ir para a página do Facebook"><i class="fa fa-facebook text-info"></i></a>
                                <a href="#" title="Ir para a página do Instagram"><i class="fa fa-instagram text-danger"></i></a>
                                <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_link ?>" title="<?php echo $whatsapp?>"><i class="fa fa-whatsapp text-success"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="sistema"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Início</a></li>
                            <li><a href="./categorias.php">Categorias</a></li>
                            <li><a href="#">Produtos</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./produtos.php">Produtos</a></li>
                                    <li><a href="./lista-produtos.php">Lista de Produtos</a></li>
                                    <li><a href="./promocoes.php">Promoções</a></li>
                                    <li><a href="./combos.php">Combos</a></li>
                                    <li><a href="./carrinho.php">Carrinho</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contatos.php">Contatos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->