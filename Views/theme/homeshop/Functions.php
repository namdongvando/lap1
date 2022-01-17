<?php

namespace Views\theme\homeshop;

use Module\giaodien\Model\Slide\SliderService;

class Functions {

    //put your code here

    public static function IsHome() {
        return (\Application::$_Controller == "index" && \Application::$_Action == "index");
    }

    public static function Slider() {
        if (self::IsHome() == false) {
            return;
        }
        $Items = SliderService::GetItemsByGroups("HomeSlide");
        ?> 
        <div id="home-slider">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 slider-left"></div>
                    <div class="col-sm-9 header-top-right">
                        <div class="homeslider">
                            <div class="content-slide">
                                <ul id="contenhomeslider">
                                    <?php
                                    foreach ($Items as $key => $value) {
                                        $_item = new SliderService($value);
                                        ?> 
                                        <li><img alt="Funky roots" src="<?php echo $_item->Images ?>" title="Funky roots" /></li>
                                        
                                        <?php
                                    }
                                    ?>  
                                </ul>
                            </div>
                        </div>
                        <div class="header-banner banner-opacity">
                            <a href="#"><img alt="Funky roots" src="/public/homeshop/assets/data/ads1.jpg" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    public static function Header() {
        $_REQUEST["keyword"] = isset($_REQUEST["keyword"]) ? $_REQUEST["keyword"] : "";
        ?> 
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/"><img src="/public/eshopper/images/home/logo.png" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                    <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <?php
                                    $menu = new \Module\giaodien\Model\Menu\MenuService();
                                    $items = $menu->GetItemsByGroupsParent("MainMenu", "");
                                    foreach ($items as $key => $value) {
                                        $_item = new \Module\giaodien\Model\Menu\MenuService($value);
                                        ?> 
                                        <li><a href="<?php echo $_item->Link ?>"><?php echo $_item->Name ?></a></li>
                                        <li class="dropdown hidden"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li><a href="shop.html">Products</a></li>
                                                <li><a href="product-details.html">Product Details</a></li> 
                                                <li><a href="checkout.html">Checkout</a></li> 
                                                <li><a href="cart.html">Cart</a></li> 
                                                <li><a href="login.html">Login</a></li> 
                                            </ul>
                                        </li> 
                                        <?php
                                    }
                                    ?>     
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <form action="/index/timkiem/" method="get" >
                                    <input value="<?php echo $_REQUEST["keyword"]; ?>" type="text" name="keyword" placeholder="Search"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->
        <?php
    }

    public static function Footer() {
        ?> 
        <footer id="footer" data-target="#footer"  class="ajaxHtml" data-url="/ajaxhtml/footer/" ><!--Footer-->

        </footer><!--/Footer-->
        <?php
    }

}
