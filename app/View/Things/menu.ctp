<div id="cart_navbar" class="navbar">
    <div class="container-fluid">
        <ul class="nav navbar-nav pull-left">
            <li class="visible">
                <h4>Salsa Lublin</h4>
            </li>
            
            <li><p style="color: green; padding-left: 50px;">Branch: AJAX</p></li>
        </ul>
        <ul class="nav navbar-nav pull-right list-inline">
            <div class="parent">
                <?php include 'cart.ctp';?>
            </div>    
            <li><i class="fa fa-phone" aria-hidden="true"></i><a> 81 454... <small>więcej</small></a></li>
            <li><a>Koszyk jest pusty</a></li>
            <li><?php echo $this->Html->link(
                    '<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Koszyk'. '<span class="item-counter">'.$counter.'</span>'. '<span class="item-counter2">&nbsp  '.$counter2.'</span>',
                    array('action' => 'menu'), 
                    array('id' => 'switchCart',
                        'escape' => false)
                )?></li>
<?= $this->Html->link('Clear Session!', array('action' => 'clearSession'));?>
<?php echo $this->Form->create('Cart',array('id'=>'add-form','url'=>array('controller'=>'things','action'=>'add ')));?>
<?php echo $this->Form->hidden('product_id',array('value'=> 7))?>
<?php echo $this->Form->submit('Add to cart',array('class'=>'btn'));?>
<?php echo $this->Form->end();?>
<span class="badge" id="cart-counter"><?php echo $count?></span>
        </ul>
        <div class="div-zmienny" style="color: green; float: left;">
            array: <p><?php
   
            ?></p>
        </div>
    </div>
</div>
<div id="m-section">
    <div class="menu-promotions">
        <div class="menu-promotions-item">
            <h4><a href="#" class="klasa">Rabat 5,00 zł !</a></h4>
        </div>
        <div class="menu-promotions-item">
            <h4>Kupon promocyjny</h4>
        </div>
        <div class="menu-promotions-item last-promotion">
            <h4>Happy Hours</h4>
        </div>
        <div class="menu-promotions-item">
            <h4>Program lojalnościowy</h4>
        </div>
        <div class="menu-promotions-item">
            <h4>Zamawiaj i Zarabiaj</h4>
        </div>
        <div class="menu-promotions-item last-promotion">
            <h4>Druga pizza za 50 % ceny</h4>
        </div>
        <div class="menu-promotions-item">
            <h4>Do każdej pizzy MAX sos GRA...</h4>
        </div>
    </div>
    <div class="restaurant-menu">
        <div class="m-flex-layout">
            <div class="m-flex-layout__aside">
                <ul>
                    <li><a href="#">Pizza</a></li>
                    <li><a href="#">Zestawy Promocyjne z Pizzą</a></li>
                    <li><a href="#">Sałatki</a></li>
                    <li><a href="#">Kebab</a></li>
                    <li><a href="#">Dodatki</a></li>
                    <li><a href="#">Sosy</a></li>
                    <li><a href="#">Napoje</a></li>
                </ul>
            </div>
            <div class="m-flex-layout__content">
                <div class="m-group">
                    <div class="m-list m-list--header">
                        <div class="m-list__featured"><?= $this->Html->image('pizza2.jpg') ?></div>
                        <div class="m-list__list">
                            <div class="m-list__item m-list__item--header">
                                <div class="m-item m-item--list">
                                    <div class="m-item__row">
                                        <div class="m-item__col-header">
                                        </div>
                                        <div class="m-item__col-group-info m-item__col-group-info--secondary">
                                            <div class="m-item__size-info"><span class="muted">30 cm</span></div>
                                        </div>
                                        <div class="m-item__col-group-info m-item__col-group-info--secondary">
                                            <div class="m-item__size-info"><span class="muted">42 cm</span></div>
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
                                                <div><div class="m-item__header"><h4 class="m-item__title"><?= $pizza['Pizza']['id'] ?>-<?= $pizza['Pizza']['name'] ?></h4></div></div>
                                                <div class="m-item__description"><span class="muted"><?= $pizza['Pizza']['ingredients']; ?></span></div>
                                            </div>
                                            <div class="m-item__col-group-info m-item__col-group-info--secondary price">
                                                <span class="m-item__price"><?= $pizza['Pizza']['sprice']; ?> zł</span>
                                            </div>
                                            <div class="m-item__col-group-info m-item__col-group-info--secondary price"> 
                                                <span class="m-item__price"><?= $pizza['Pizza']['bprice']; ?> zł</span>
                                            </div>
                                            <div class="m-item__col m-item__col--secondary actions"> 
                                                <div class="btn-group">
                                                    <?php 
//                                                        echo $this->Html->link('Do koszyka <span class="caret"></span>', 
//                                                                                    array('action' => 'menu'), 
//                                                                                    array('class' => 'btn add-button', 
//                                                                                        'id' => $pizza['Pizza']['id'],
//                                                                                        'onclick' => "addToBox('".$pizza['Pizza']['id']."', '".$pizza['Pizza']['name']."')",
//                                                                                        'escape' => false
//                                                                                         )
//                                                                                 ); 
                                                    ?>
                                                    <?php 
                                                        echo $this->Html->link('Do koszyka <span class="caret"></span>', 
                                                                array('action' => false), 
                                                                array('class' => 'btn add-button',
                                                                    'id' => $pizza['Pizza']['id'], 
                                                                    'onclick' => "togglePizzaSize('".$pizza['Pizza']['id']."')", 
                                                                    'escape' => false))
                                                    ?>
                                                    <ul class="pizza-size-list" id="id_<?php echo $pizza['Pizza']['id'] ?>">
                                                        <li><?php echo $this->Form->create('Thing',array('id'=>'add-form2', 'class'=> 'sas','url'=>array('controller'=>'things','action'=>'addToBoxSesja')));?>
                                                            <?php echo $this->Form->hidden('product_id',array('value'=> $pizza['Pizza']['id']))?>
                                                            <?php echo $this->Form->hidden('item_name',array('value'=> $pizza['Pizza']['name']))?>
                                                            <?php echo $this->Form->hidden('price',array('value'=> $pizza['Pizza']['sprice']))?>
                                                            <?php echo $this->Form->hidden('size',array('value'=> 1))?>
                                                            <?php echo $this->Form->submit('Duża - 30 cm - '.$pizza['Pizza']['sprice'].'',array('class'=>'btnAddToCart'));?>
                                                            <?php echo $this->Form->end();?>
                                                        </li>
                                                        <li><?php echo $this->Form->create('Thing',array('id'=>'add-form2', 'class'=> 'sas','url'=>array('controller'=>'things','action'=>'addToBoxSesja')));?>
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

<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(document).scrollTop() > 200) {
                $("#cart_navbar").addClass("affixed");
            } else {
                $("#cart_navbar").removeClass("affixed");
            }
        });
    });
    
    function prevent_add_btn_Link_Redirect(){
        for(i=1;i<=<?=$pizza['Pizza']['id']?>;i++){
            document.getElementById(i).addEventListener("click", function(e){
            e.preventDefault(i);
        });
        }
    }
    
//    var dl = document.getElementsByClassName("list-element").length;
//    for(j = 0; j < dl; j++){
//        document.getElementsByClassName("list-element")[j].addEventListener("click", function(e){
//            e.preventDefault();
//        }); 
//    }

    window.onload = prevent_add_btn_Link_Redirect();
    
    function addToBox(id, name, size, price){
                $.ajax(
                {
                    url: "<?= $this->Html->url('addToBoxAjax/') ?>" + id + "/" + name + "/" + size + "/" + price ,
                    success: function () {
                        $(document).ready(function(){
                            $(".pizza-size-list").hide();
                        });
                        $(document).ready(function(){
                            $(".box").fadeIn();
                        });  

                    }
                }); 
    } 
    
    $(document).ready(function(){
        $(".pizza-size-list").hide();
    });

    
function togglePizzaSize(toggleId) {
    var x = document.getElementById("id_"+toggleId);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
        ///to jest chyba do niczego nie potrzebne
        prevent_Link();
    }
}

</script>

<script>
$(document).ready(function testowaDoPojedynczegoPrzycisku(){
	$('#add-form').submit(function(e){
		e.preventDefault();
//		var tis = $(this);
//		$.post($(this).attr('action'),$(this).serialize(),function(idFromPost){
//			$('#cart-counter').text(idFromPost);
//		});
                $('#add-form').text($.post);
	});
});
</script>
<script>
$(document).ready(function counterAmount(){
    $('.sas').submit(function(e){
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function(daneZPosta){
                $('.item-counter').text(daneZPosta.key0);
                console.log(daneZPosta);
                $('.div-zmienny').text(daneZPosta);
                var size;
                if(Number(daneZPosta.key4) === 1){size="Mała";}
                else if (Number(daneZPosta.key4) === 2)
                {size = "Duża";} else {size = "jakas inna";}
                $('#wKoszyku').html(daneZPosta.key1 + daneZPosta.key2 + daneZPosta.key3 + size);

        },"json");
        $(document).ready(function(){
            $(".pizza-size-list").hide();
        });
        $(document).ready(function(){
            $(".box").fadeIn();
        });  
//        $.post($(this).attr('action'),$(this).serialize(),function(daneZPosta){
//                $('#wKoszyku').text(daneZPosta);
//                console.log(daneZPosta.klucz1);
//        });
//        $.post( "addToBoxSesja",$(this).serialize(), function( data ) {
//          console.log(data); // John
//        },"json");
    });
});

//    $.post( "addToBoxSesja", function( data ) {
//      console.log(data); // John
//
//    },"json");

</script>

    <!--            <script>
                $.post( "wywalJSONwConsoli", function( data ) {
                console.log(data[0][0].Pizza.name +" \nSkładniki:"+ data[0][0].Pizza.ingredients);
                },"json");
                </script>-->