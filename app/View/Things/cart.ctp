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
                if(!empty($dishesInCart)){
                    foreach ($dishesInCart as $dishInCart):?>
                        <div class="dishName" id="dishId<?= $dishInCart['id'].$dishInCart['size'];?>">
                            <div class="info">
                                <strong><?= $dishInCart['id'].'-';?><?= $dishInCart['itemName'];?></strong>
                                <?php  
                                if($dishInCart['size'] == 1){echo 'Duża';}
                                else if($dishInCart['size'] == 2){echo 'Max';}
                                else {echo 'UNDEFINED SIZE OF PIZZA';}
                                ?>
                                <?php echo $this->Html->link('remove', array('action' => 'removeController', $dishInCart['id']), array('class' => 'IdChroniony'));?>
                            </div>
                            <div class="quantity">
                                <?= $this->Html->link('-&nbsp', array('action' => false), array('onclick'=>"decrementAjax('".$dishInCart['id']."', '".$dishInCart['price']."', '".$dishInCart['size']."')",'id'=>'prefix'.$dishInCart['id'], 'class' => 'decrement', 'escape' => false)); ?>
                                <?php echo $this->Form->input('amount', array('type' => 'text', 'label' => false, 'class' => 'cartInput','id' => 'prefix'.$dishInCart['id'].$dishInCart['size']  ,'value' => $dishInCart['amount'])) ?>
                                <?= $this->Html->link('&nbsp+', array('action' => false), array('onclick'=>"incrementAjax('".$dishInCart['id']."', '".$dishInCart['price']."', '".$dishInCart['size']."')",'id'=>'prefix'.$dishInCart['id'], 'class' => 'increment', 'escape' => false)); ?>
                            </div>
                            <div class="subtotal"><?= number_format($dishInCart['price']*$dishInCart['amount'], 2); ?></div>
                        </div>
                    <?php endforeach;
                } else {
                echo $emptyCartInfo;
                }
                ?>
            </div>
        </div>
<!--        <div class="delivery"><?php echo $this->Html->link('Zamów', array('controller' => 'orders', 'action' => 'create'), array('class' => '')); ?></div>
        <div class="cart-summary">
            <?php echo $this->Html->link('Ukryj koszyk', false, 
                    array('class' => 'btn-box', 'id' => 'btn-hide-box')); ?>
            <button class="btn-box order-btn" style="display: none">button</button>
        </div>-->
        <div class="delivery"><?php echo $this->Html->link('Zamów', array('controller' => 'orders', 'action' => 'create'), array('class' => '')); ?></div>
            <?php if(!empty($dishesInCart)): ?>
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
    
    /**
     * don't redirect after click on +
     */ 
    for(var o=0; o< <?php echo count($array)?>; o++){
        document.getElementsByClassName("increment")[o].addEventListener("click", function(o){
            o.preventDefault(); 
        });
    }
    
    /**
     * don't redirect after click on -
     */ 
    for(var d=0; d< <?php echo count($array)?>; d++){
        document.getElementsByClassName("decrement")[d].addEventListener("click", function(d){
            d.preventDefault(); 
        });
    }
    
    /**
     * perform increment function without reloading page (using ajax)
     */
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
    
    /**
     * perform decrement function without reloading page (using ajax)
     */
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
            $(".box").fadeIn();
        });
    window.onload = blockLinkRedirect();
    });
</script>   
