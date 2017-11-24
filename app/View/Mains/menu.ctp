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
                        <li><a href="#pizza">Pizze</a></li>
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
<section class="module parallax parallax-2">
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

/*
 * 2 parallel functions works while adding/removing items from cart
 * addToBoxAjax() - without reloading website
 * and
 * addToBoxSession() - on the server side, added items saving in SESSION
 */
$(document).ready(function addToBoxAjax(){
    $('.callFunctionAddToBoxSession').submit(function(e){
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function(dataFromRequest){
                
                var decrement = "<a onclick=\"decrementAjax("+dataFromRequest.id+", "+dataFromRequest.price+", "+dataFromRequest.size+")\" class=\"decrement appendedElements\">-&nbsp</a>";
                var inputAmount = "<div class=\"input text\"><input name=\"data[amount]\" class=\"cartInput\" id=\"prefix"+dataFromRequest.id+dataFromRequest.size+"\" value=\"<?= 1 ?>\" type=\"text\"/></div>";
                var increment = "<a onclick=\"incrementAjax("+dataFromRequest.id+", "+dataFromRequest.price+", "+dataFromRequest.size+")\"  class=\"increment appendedElements\">&nbsp+</a>";

                $('.item-counter').text(dataFromRequest.counter);

                var size;
                if(Number(dataFromRequest.size) === 1){size="Duża";}
                else if (Number(dataFromRequest.size) === 2){size = "Max";} 
                else if (Number(dataFromRequest.size) > 2 && Number(dataFromRequest.size) <=7){size = "";} 
                else {size = "Undefined size of pizza!";}

                if(dataFromRequest.whetherItemInCart === true){
                    //item already exists in cart
                    updateInputValue(dataFromRequest.id, dataFromRequest.size);
                    displayOrderButton();
                }
                else if(dataFromRequest.whetherItemInCart === false) {
                    //display new item inside the cart
                    displayOrderButton();
                    emptyCartInfoDisappear();
                    $('#inCart').append("<div class=\"dishName\" id=\"dishId"+dataFromRequest.id+dataFromRequest.size+"\"><div class='info'><strong>"+dataFromRequest.id+"-"+dataFromRequest.name+"</strong>&nbsp;"+size+
                        "</div><div class=\"quantity\">"+decrement+inputAmount+increment+"</div><div class='subtotal'>"+dataFromRequest.price+"</div></div>");
                }
                else {
                    alert("Sorry! Something went wrong.Try to put product in cart later");
                }
        },"json");
        $(document).ready(function(){
            $(".pizza-size-list").hide();
        });
        $(document).ready(function(){
            $(".box").fadeIn();
        });
    });
});
</script>
