<div class="box">
    <div class="box-header">
        <h5>Koszyk</h5>
        <?= $this->Html->link('Wyczyść', array('action' => 'clearSession'), array('id' => 'clearCart')); ?>
        <?php
        echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i>', 
                array('action' => 'menu'), 
                array('class' => 'close-cart' ,
                    'id' => 'close-cart',
                    'escape' => false));
        ?>
    </div>
    <div class="box-body">
        <div class="cart-items">
            <div id="inCart">
                <?php ob_start(); ?>
                    <span class="empty">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Koszyk jest pusty
                    </span>
                <?php $emptyCartInfo = ob_get_clean(); ?>
                
                <?php 
                if(!empty($mealsInCart)){
                    foreach ($mealsInCart as $mealInCart):?>
                        <div class="dishName" id="dishId<?= $mealInCart['id'].$mealInCart['size'];?>">
                            <div class="info">
                                <strong><?= $mealInCart['itemName'];?></strong>
                                <?php  
                                if($mealInCart['size'] == 1){echo 'Średnia';}
                                else if($mealInCart['size'] == 2){echo 'Duża';}
                                else if ($mealInCart['size'] > 2 && $mealInCart['size'] <=7){echo "";} 
                                else {echo 'UNDEFINED SIZE OF PIZZA';}

                                ?>
                            </div>
                            <div class="quantity">
                                <?= $this->Html->link('-&nbsp', array('action' => false), array('onclick'=>"decrementAjax('".$mealInCart['id']."', '".$mealInCart['price']."', '".$mealInCart['size']."')",'id'=>'prefix'.$mealInCart['id'], 'class' => 'decrement', 'escape' => false)); ?>
                                <?php echo $this->Form->input('amount', array('type' => 'text', 'label' => false, 'class' => 'cartInput','id' => 'prefix'.$mealInCart['id'].$mealInCart['size']  ,'value' => $mealInCart['amount'])) ?>
                                <?= $this->Html->link('&nbsp+', array('action' => false), array('onclick'=>"incrementAjax('".$mealInCart['id']."', '".$mealInCart['price']."', '".$mealInCart['size']."')",'id'=>'prefix'.$mealInCart['id'], 'class' => 'increment', 'escape' => false)); ?>
                            </div>
                            <div class="subtotal"><?= number_format($mealInCart['price']*$mealInCart['amount'], 2); ?></div>
                        </div>
                    <?php endforeach;
                } else {
                echo $emptyCartInfo;
                }
                ?>
            </div>
        </div>
            <?php if(!empty($mealsInCart)): ?>
                <div class="cart-summary" style="display: flex;">
                <?php echo $this->Html->link('Ukryj koszyk', false, 
                        array('class' => 'btn-box', 'id' => 'btn-hide-box', 'style' => "width: 50%;")) ?>
                <button class="btn-box order-btn" style="width: 50%;"><?php echo "Zamów ( ". number_format($finalOrderPrice, 2). " zł )";?></button>
                </div>
            <?php else: ?>
                <div class="cart-summary">
                    <?php echo $this->Html->link('Ukryj koszyk', false, 
                            array('class' => 'btn-box', 'id' => 'btn-hide-box')) ?>
                    <button class="btn-box order-btn" style="display: none;"></button>
                </div>
            <?php endif; ?>
    </div>
</div>

<script>
    $(function () {
        $('.close-cart').on('click', function () {
            $('.box').fadeOut();
        });
        $('#btn-hide-box').on('click', function () {
            $('.box').fadeOut(500);
        });
    });

    //don't redirect after click on +
    for(var o=0; o< <?php echo count($array)?>; o++){
        document.getElementsByClassName("increment")[o].addEventListener("click", function(o){
            o.preventDefault(); 
        });
    }
    
    //don't redirect after click on -
    for(var d=0; d< <?php echo count($array)?>; d++){
        document.getElementsByClassName("decrement")[d].addEventListener("click", function(d){
            d.preventDefault(); 
        });
    }
    

    //perform increment function without reloading page (using ajax)
    function incrementAjax(selectedPizza_ID, price, size) {
        $.ajax({
            dataType: 'json',
            url: "<?= $this->Html->url('incrementController/') ?>" + selectedPizza_ID + "/" + price+"/"+ size,
            success: function (afterIncrement) {
                $(".cartInput#prefix"+selectedPizza_ID+size).val(afterIncrement.amount);
                $(".item-counter").text(afterIncrement.count);
                var totalPrice = afterIncrement.price * afterIncrement.amount;
                $("#dishId"+selectedPizza_ID+size+" .subtotal").text(totalPrice.toFixed(2));
                displayOrderButton();
            }   
        }); 
    }
    

    //perform decrement function without reloading page (using ajax)
    function decrementAjax(selectedPizza_ID, price, size) {
        $.ajax({
            dataType: 'json',
            url: "<?= $this->Html->url('decrementController/') ?>" + selectedPizza_ID +"/"+ price+"/"+ size,
            success: function (afterDecrement) {
                $(".cartInput#prefix"+selectedPizza_ID+size).val(afterDecrement.amount);
                $(".item-counter").text(afterDecrement.count);
                var totalPrice = afterDecrement.price * afterDecrement.amount;
                $("#dishId"+selectedPizza_ID+size+" .subtotal").text(totalPrice.toFixed(2));
                displayOrderButton();
                if(afterDecrement.amount < 1) {
                    $("#dishId" + selectedPizza_ID + size).remove();
                    if ($(".dishName").length === 0){
                        hideOrderButton();
                        $("#inCart").append("<span class='empty'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Koszyk jest pusty</span>");
                    }
                }
            }
        }); 
    }
    
    function emptyCartInfoDisappear() {
        $('.empty').hide();
    }  

    function updateInputValue(id, size){
        $.ajax({
            dataType: "json",
            url: "<?= $this->Html->url('readUpdatedArrayFromSession/') ?>" + id + "/" + size,
            success: function (updatedData) {
                $('.cartInput#prefix' + id + size).val(updatedData.amount);
                var totalPrice = updatedData.price * updatedData.amount;
                $("#dishId" + id + size + " .subtotal").text(totalPrice.toFixed(2));
            }
        }); 
    }

    function displayOrderButton() {
        final_price();
        $('.btn-box').show();
        $(".btn-box").css({"width" : "50%"});
        $(".cart-summary").css({"display": "flex"});
    }

    function final_price(){
        $.ajax({
            dataType: "json",
            url: "<?= $this->Html->url('total/') ?>",
            success: function(jsonFinalPrice){
                $(".order-btn").html("Zamów ( " + jsonFinalPrice + " zł )");
            }
        });
    } 

    function hideOrderButton(){
        $(".order-btn").hide();
        $(".btn-box").css({"width" : ""});
        $(".cart-summary").css({"display": "block"});
    }

    document.getElementById("close-cart").addEventListener("click", function(event){
        event.preventDefault();
    });
    
    document.getElementById("btn-hide-box").addEventListener("click", function(event){
        event.preventDefault();
    });
    
    function blockLinkRedirect(){
        document.getElementById("switchCart").addEventListener("click", function(event){
            event.preventDefault();
        });
    }
    
    $(document).ready(function displayShoppingCart(){
        $("#switchCart").on('click',function(){
            $(".box").toggle();
        });
    window.onload = blockLinkRedirect();
    });
</script>   
