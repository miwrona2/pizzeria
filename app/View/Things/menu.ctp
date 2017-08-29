<div id="m-section">

    <div class="restaurant-menu">
        <div class="m-flex-layout">
<!--            <div class="m-flex-layout__aside">
                <ul>
                    <li><a href="#">Pizza</a></li>
                    <li><a href="#" id="this">Zestawy Promocyjne z Pizzą</a></li>
                    <li><a href="#" id="this1">Sałatki</a></li>
                    <li><a href="#" id="this2">Kebab</a></li>
                    <li><a href="#" id="this3">Dodatki</a></li>
                    <li><a href="#" id="this4">Sosy</a></li>
                    <li><a href="#" id="this5">Napoje</a></li>
                </ul>
            </div>-->
            <div class="m-flex-layout__content">
                <div id="cart_navbar" class="navbar">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav pull-left">
                            <li class="visible">
                                <h4>Salsa Lublin</h4>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav pull-right list-inline">
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a> 81 454... <small>więcej</small></a></li>
                            <li><a>Koszyk jest pusty</a></li>
                            <li><a>Koszyk</a></li>
                        </ul>
                        <div class="div-zmienny" style="color: #333434; float: left;">
                            Branch: Layout-Italy
                        </div>
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
                                                    <?php echo $this->Html->link('Do koszyka', array('action' => 'menu') , array('class' => 'btn add-button', 
                                                        'id' => $pizza['Pizza']['id'],
                                                        'onclick' => 'innaFunkcja('.$pizza['Pizza']['id'].')'
                                                        )
                                                            
                                                            ); ?>
                                                    <!--<a href="#" class="btn add-button">Do koszyka<span class="caret"></span></a>-->
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
</script>

 <script>



    $(document).ready(function(){
        $("#this1").on('click',function(){
        
                $("#this2").toggle();
        });
    }); 
    
    for(i=1;i<=<?=$pizza['Pizza']['id']?>;i++){
    document.getElementById(i).addEventListener("click", function(e){
    e.preventDefault(i)
    });
    console.log(i);
    }

    function innaFunkcja(id){
        console.log(id);
        alert('Dodano do koszyka pizze o id: ' + id);
        $('#' + id).css('background', 'red');
    }

</script>   