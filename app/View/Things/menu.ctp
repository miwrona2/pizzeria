<section class="module parallax parallax-1" id="hero">
  <div class="kontener">
    <span id="arrow-down"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
    <h1>Menu</h1>
  </div>
</section>
<div id="m-section">
    <div class="restaurant-menu">
                <div id="cart_navbar" class="navbar">
                    <div class="menu-cart-heading">
                        <ul class="nav navbar-nav pull-left">
                            <li class="visible">
                                <h4>Catania</h4>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav pull-right list-inline">
                            <div class="parent">
                                <?php include 'cart.ctp';?>
                            </div>
                            <li><?php echo $this->Html->link(
                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Koszyk'. '<span class="item-counter">'.$count.'</span>',
                                    array('action' => 'menu'),
                                    array('id' => 'switchCart',
                                        'escape' => false)
                                )?>
                            </li>
                    </div>
                </div>
            <div class="m-flex-layout__content">
                <div id="menu-nav">
                    <ul>
                        <li><a>Menu</a></li>
                        <li><a href="#pizza">Pizza</a></li>
                        <li><a href="#pasta">Pasty</a></li>
                        <li><a href="#salads">Sałatki</a></li>
                        <li><a href="#additions">Dodatki</a></li>
                        <li><a href="#sauces">Sosy</a></li>
                        <li><a href="#drinks">Napoje</a></li>
                    </ul>
                </div>
                <div class="m-group">
                    <?php include 'menu-sections/pizzas.ctp';?>
                    <?php include 'menu-sections/pastas.ctp';?>
                    <?php include 'menu-sections/salads.ctp';?>
                    <?php include 'menu-sections/additions.ctp';?>
                    <?php include 'menu-sections/sauces.ctp';?>
                    <?php include 'menu-sections/drinks.ctp';?>
                </div>
            </div>

    </div>
</div>
<section class="module parallax parallax-3">
  <div class="kontener">
    <h1></h1>
  </div>
</section>

<script>

launch_functions_onload();

function launch_functions_onload(){
    sticky_cart_navbar();
    scrollDown();
    arrow_animation();
}

function sticky_cart_navbar(){
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(document).scrollTop() > 780) {
                $("#cart_navbar").addClass("affixed");
                $("#menu-nav").addClass("menu-nav-affixed");
            } else {
                $("#cart_navbar").removeClass("affixed");
                $("#menu-nav").removeClass("menu-nav-affixed");
            }
        });
    });
}

function scrollDown() {
    var arrow_down = $('#arrow-down');
    var hero = $('#hero');

    arrow_down.click(function(){
        $('html, body').animate({
            scrollTop : hero[0].scrollHeight    
        }, 1000);
    });
}

function arrow_animation() {
    $(document).ready(function(){
         $( '#arrow-down' ).animate({top: "95vh"}, 2000, function(){
             $( '#arrow-down' ).animate({top: "100vh"}, 2000);
            setTimeout(arrow_animation(), 1000);
         });
    });
}
</script>
