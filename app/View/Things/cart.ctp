<div class="box">
    <div class="box-header">
        <h5>Koszyk</h5>
        <?= $this->Html->link('Wyczyść', array('action' => false), array('id' => 'clearCart','onclick' => "clearCart()" ,'escape' => false)); ?>
        <?php
        echo $this->Html->link('x', 
                array('action' => 'menu'), 
                array('class' => 'close-cart' ,
                    'id' => 'close-cart',
                    'escape' => false));
        ?>
        <!--<a href="#" class="close-cart"><i class="fa fa-close" aria-hidden="true"></i></a>-->
    </div>
    <div class="box-body">
        <div class="cart-items">
                    <div id="wKoszyku" style="background: #dff0d8">koszyk</div>
            <?php echo '<br>'; 
            if(!empty($dishesInCart)){
                foreach ($dishesInCart as $dishInCart):?>
            <div class="dishName"><strong><?= $dishInCart['id'].'-';?><?= $dishInCart['itemName'];?></strong>
            <?php  if($dishInCart['size'] == 1){echo 'mala';}
            else if($dishInCart['size'] == 2){echo 'duza';}
            else { echo 'UNDEFINED PIZZA SIZE';}
            ?>
                <div style="float: right"><?= $dishInCart['price'] ?></div>
            </div>
            <br>
                <?php endforeach;
            } else {
            echo '<span class="empty">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Koszyk jest pusty
            </span>';
            }
            ?>
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
    
    function clearCart(){
            $.ajax(
            {
                url: "<?= $this->Html->url('AjaxClearCart/') ?>",
                success: function () {
                    alert('Udało się wyczyścić koszyk!');
                }
            });
    }
</script>   