<?php
    require_once("cabecalho.php");
?>

<?php
    require_once("cabecalho-busca.php");
?>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar Section Begin -->
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>SubCategorias</h4>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Filtrar Por Valor</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <form method="get" action="lista-produtos.php">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                            <a class="text-dark" type="submit">
                                                <i class="fa fa-search ml-2"></i>
                                            </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Lançamentos</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/produtos/produto-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Camisa Feminina</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/produtos/produto-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Camisa Masculina</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/produtos/produto-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Regata Feminina</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/produtos/produto-4.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Regata Masculina</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/produtos/produto-5.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Sapato Feminino</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/produtos/produto-6.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Sapato Masculino</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Section End -->
            
            <!-- Display Section Begin -->
            <div class="col-lg-9 col-md-7">
                <!-- Promoção Section Begin -->
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Promoções</h2><span class="ml-2"><a class="text-muted" href="promocoes.php" title="Ver todas as Promoções"><small><i class="fa fa-eye mr-1"></i>Ver Todas</small></a></span>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/produto-7.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="#">Tênis Feminino</a></h5>
                                        <div class="product__item__price">
                                            $30.00 <span>$36.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/produto-8.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="#">Tênis Masculino</a></h5>
                                        <div class="product__item__price">
                                            $30.00 <span>$36.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/produto-9.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="#">Calça Feminina</a></h5>
                                        <div class="product__item__price">
                                            $30.00 <span>$36.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/produto-10.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="#">Calça Masculina</a></h5>
                                        <div class="product__item__price">
                                            $30.00 <span>$36.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/produto-11.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="#">Bermuda Feminina</a></h5>
                                        <div class="product__item__price">
                                            $30.00 <span>$36.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/produtos/produto-12.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <h5><a href="#">Bermuda Masculina</a></h5>
                                        <div class="product__item__price">
                                            $30.00 <span>$36.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Promoção Section End -->

                <!-- Mais Vendidos Section Begin -->
                <div class="section-title product__discount__title">
                    <h2>Produtos Mais Vendidos</h2>
                    <span class="ml-2">
                        <a class="text-muted" href="lista-produtos.php" title="Ver todos os Produtos">
                            <small><i class="fa fa-eye mr-1"></i>Ver Todos</small>
                        </a>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-1.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Camisa Feminina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-2.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Camisa Masculina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-3.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Regata Feminina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-4.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Regata Masculina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-5.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Sapato Feminino</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-6.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Sapato Masculino</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mais Vendidos Section End -->

                <!-- Combos Mais Vendidos Section Begin -->
                <div class="section-title product__discount__title">
                    <h2>Combos Mais Vendidos</h2>
                    <span class="ml-2">
                        <a class="text-muted" href="combos.php" title="Ver todos os Combos">
                            <small><i class="fa fa-eye mr-1"></i>Ver Todos</small>
                        </a>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-7.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Tênis Feminino</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-8.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Tênis Masculino</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-9.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Calça Feminina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-10.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Calça Masculina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-11.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Bermuda Feminina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/produtos/produto-12.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <a href="produto.php">
                                    <h6>Bermuda Masculina</h6>
                                    <h5>$30.00</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Combos Mais Vendidos Section End -->
            </div>
            <!-- Display Section End -->
        </div>
    </div>
</section>
<!-- Product Section End -->

<?php
    require_once("rodape.php");
?>