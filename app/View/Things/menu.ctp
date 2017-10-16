<section class="module parallax parallax-1" id="hero">
  <div class="kontener">
    <span id="arrow-down" onclick="scrollDown()"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
    <h1>Menu</h1>
  </div>
</section>
<div id="m-section">

    <div class="restaurant-menu">
        <div class="m-flex-layout">
<!--            <div class="m-flex-layout__aside">
                <ul>
                    <li><a href="#">Pizza</a></li>
                    <li><a href="#">Zestawy Promocyjne z Pizzą</a></li>
                    <li><a href="#">Sałatki</a></li>
                    <li><a href="#">Kebab</a></li>
                    <li><a href="#">Dodatki</a></li>
                    <li><a href="#">Sosy</a></li>
                    <li><a href="#">Napoje</a></li>
                </ul>
            </div>-->
            <div class="m-flex-layout__content">
                <div id="cart_navbar" class="navbar">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav pull-left">
                            <li class="visible">
                                <h4>Salsa Lublin</h4>
                            </li>

                            <li><p style="color: green; padding-left: 50px;">Branch: AJAX - TEST</p></li>
                        </ul>
                        <ul class="nav navbar-nav pull-right list-inline">
                            <div class="parent">
                                <?php include 'cart.ctp';?>
                            </div>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a> 81 454... <small>więcej</small></a></li>
                            <li><a>Koszyk jest pusty</a></li>
                            <li><?php echo $this->Html->link(
                                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Koszyk'. '<span class="item-counter">'.$count.'</span>',
                                    array('action' => 'menu'),
                                    array('id' => 'switchCart',
                                        'escape' => false)
                                )?>
                            </li>
                    </div>
                </div>
                <div class="m-group">
                    <div class="m-list m-list--header">
                        <!--<div class="m-list__featured"><?= $this->Html->image('pizza2.jpg') ?></div>-->
                        <div class="m-list__list">
                            <div class="m-list__item m-list__item--header" style="background: #fff;">
                                <div class="m-item m-item--list">
                                    <div class="m-item__row">
                                        <div class="m-item__col-header">
                                        </div>
                                        <div class="m-item__col-group-info m-item__col-group-info--secondary">
                                            <div class="m-item__size-info"><span class="muted"><mark>30 cm</mark></span></div>
                                        </div>
                                        <div class="m-item__col-group-info m-item__col-group-info--secondary">
                                            <div class="m-item__size-info"><mark><span class="muted">42 cm</span></mark></div>
                                        </div>
                                        <div class="m-item__col m-item__col--secondary">
                                            <div class="m-item__size-info"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-list m-list--list">
                        <ul class="m-list__list">
                            <?php foreach ($pizzas as $pizza) : ?>
                                <li class="m-list__item">
                                    <div class="m-item m-item--list pizza">
                                        <div class="m-item__row">
                                            <div class="m-item__col-header ">
                                                <div><div class="m-item__header"><h4 class="m-item__title"><mark><?= $pizza['Pizza']['id'] ?>-<?= $pizza['Pizza']['name'] ?></mark></h4></div></div>
                                                <div class="m-item__description"><span class="muted"><mark class="inside-muted"><?= $pizza['Pizza']['ingredients']; ?></mark></span></div>
                                            </div>
                                            <div class="m-item__col-group-info m-item__col-group-info--secondary price">
                                                <mark><span class="m-item__price"><?= $pizza['Pizza']['sprice']; ?> zł</span></mark>
                                            </div>
                                            <div class="m-item__col-group-info m-item__col-group-info--secondary price">
                                                <mark><span class="m-item__price"><?= $pizza['Pizza']['bprice']; ?> zł</span></mark>
                                            </div>
                                            <div class="m-item__col m-item__col--secondary actions">
                                                <div class="btn-group">
                                                    <?php
                                                        echo $this->Html->link('Do koszyka <span class="caret"></span>',
                                                                array('action' => false),
                                                                array('class' => 'btn add-button',
                                                                    'id' => $pizza['Pizza']['id'],
                                                                    'onclick' => "togglePizzaSize('".$pizza['Pizza']['id']."')",
                                                                    'escape' => false))
                                                    ?>
                                                    <ul class="pizza-size-list" id="id_<?php echo $pizza['Pizza']['id'] ?>">
                                                        <li><?php echo $this->Form->create('Thing',array('id'=>'add-form-action', 'class'=> 'callFunctionAddToBoxSession','url'=>array('controller'=>'things','action'=>'addToBoxSession')));?>
                                                            <?php echo $this->Form->hidden('product_id',array('value'=> $pizza['Pizza']['id']))?>
                                                            <?php echo $this->Form->hidden('item_name',array('value'=> $pizza['Pizza']['name']))?>
                                                            <?php echo $this->Form->hidden('price',array('value'=> $pizza['Pizza']['sprice']))?>
                                                            <?php echo $this->Form->hidden('size',array('value'=> 1))?>
                                                            <?php echo $this->Form->submit('Duża - 30 cm - '.$pizza['Pizza']['sprice'].'',array('class'=>'btnAddToCart'));?>
                                                            <?php echo $this->Form->end();?>
                                                        </li>
                                                        <li><?php echo $this->Form->create('Thing',array('id'=>'add-form-action', 'class'=> 'callFunctionAddToBoxSession','url'=>array('controller'=>'things','action'=>'addToBoxSession')));?>
                                                            <?php echo $this->Form->hidden('product_id',array('value'=> $pizza['Pizza']['id']))?>
                                                            <?php echo $this->Form->hidden('item_name',array('value'=> $pizza['Pizza']['name']))?>
                                                            <?php echo $this->Form->hidden('price',array('value'=> $pizza['Pizza']['bprice']))?>
                                                            <?php echo $this->Form->hidden('size',array('value'=> 2))?>
                                                            <?php echo $this->Form->submit('Max - 42 cm - '.$pizza['Pizza']['bprice'].'',array('class'=>'btnAddToCart'));?>
                                                            <?php echo $this->Form->end();?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="module parallax parallax-3">
  <div class="kontener">
    <h1>The End</h1>
  </div>
</section>

<script>

    launch_functions_onload();

    function launch_functions_onload(){
        sticky_cart_navbar();
        prevent_add_btn_Link_Redirect();
        $(".pizza-size-list").hide();
    }

    function sticky_cart_navbar(){
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(document).scrollTop() > 750) {
                    $("#cart_navbar").addClass("affixed");
                } else {
                    $("#cart_navbar").removeClass("affixed");
                }
            });
        });
    }

    function prevent_add_btn_Link_Redirect(){
        for(i=1;i<=<?=$pizza['Pizza']['id']?>;i++){
            document.getElementById(i).addEventListener("click", function(e){
            e.preventDefault(i);
        });
        }
    }

    function togglePizzaSize(toggleId) {
        var pizzaSizeList = document.getElementsByClassName("pizza-size-list");

        var id_pizzaSizeList = document.getElementById("id_"+toggleId);
        if (id_pizzaSizeList.style.display === 'none') {
            for (p=0; p<pizzaSizeList.length; p++){
                pizzaSizeList[p].style.display = 'none';
            }
            id_pizzaSizeList.style.display = 'block';
        } else {
            id_pizzaSizeList.style.display = 'none';
        }
    }

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
                    else if (Number(dataFromRequest.size) === 2)
                    {size = "Max";} else {size = "Undefined size of pizza!";}

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
    
//    function scrollDown(){
//        var viewport = document.getElementById("viewport");
//        var hero =  document.getElementById("hero");
//        viewport.scrollTop = hero.scrollHeight;
//        console.log(hero.scrollHeight);        
//    }
   
function scrollDown(){
    $(document).ready(function(){
          $('#viewport').animate({
            scrollTop: $("#m-section").offset().top
          }, 2000, function(){
          });
    });
}
</script>
