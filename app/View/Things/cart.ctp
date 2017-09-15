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
                
                <?php echo '<br>'; 
                if(!empty($dishesInCart)){
                    foreach ($dishesInCart as $dishInCart):?>
                        <div class="dishName">
                            <div class="info">
                                <strong><?= $dishInCart['id'].'-';?><?= $dishInCart['itemName'];?></strong>
                                <?php  
                                if($dishInCart['size'] == 1){echo 'Mała';}
                                else if($dishInCart['size'] == 2){echo 'Duża';}
                                else {echo 'UNDEFINED SIZE OF PIZZA';}
                                ?>
                                <?php echo $this->Html->link('increment', array('action' => 'incrementController', $dishInCart['id']), array('class' => 'IdChroniony'));?>
                            </div>
                            <div class="quantity">
                                <?= $this->Html->link('-&nbsp', array('action' => false), array('onclick'=>"decrementAjax('".$dishInCart['id']."')",'id'=>'prefix'.$dishInCart['id'], 'class' => 'decrement', 'escape' => false)); ?>
                                <?php echo $this->Form->input('amount', array('type' => 'text', 'label' => false, 'class' => 'cartInput','id' => 'prefix'.$dishInCart['id']  ,'value' => $dishInCart['amount'])) ?>
                                <?= $this->Html->link('&nbsp+', array('action' => false), array('onclick'=>"incrementAjax('".$dishInCart['id']."')",'id'=>'prefix'.$dishInCart['id'], 'class' => 'increment', 'escape' => false)); ?>
                            </div>
                            <div class="subtotal"><?= $dishInCart['price'] ?></div>
                        </div>
                        <br>
                    <?php endforeach;
                } else {
                echo $emptyCartInfo;
                }
                ?>
            </div>
        </div>
        <div class="delivery"><?php echo $this->Html->link('Zamów', array('controller' => 'orders', 'action' => 'create'), array('class' => '')); ?></div>
        <div class="atcions">
            <?php echo $this->Html->link('Ukryj koszyk', false, 
                    array('class' => 'btn-box', 'id' => 'btn-hide-box')); ?>
        </div>
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
    function incrementAjax(checkedPizza_ID) {
        $.ajax({
            dataType: 'json',
            url: "<?= $this->Html->url('incrementController/') ?>" + checkedPizza_ID,
            success: function (afterIncrement) {
                $(".cartInput#prefix"+checkedPizza_ID).val(afterIncrement.amount);
                $('.item-counter').text(afterIncrement.count);
            }
        }); 
    }
    
    /**
     * perform decrement function without reloading page (using ajax)
     */
    function decrementAjax(checkedPizza_ID) {
        $.ajax({
            url: "<?= $this->Html->url('decrementController/') ?>" + checkedPizza_ID,
            success: function (amount) {
                $(".cartInput#prefix"+checkedPizza_ID).val(amount);
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