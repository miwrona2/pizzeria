<div id="pizza">
    <div class="menu-section-header">
        <h5><mark>Pizza</mark></h5>
    </div>
    <div class="m-list m-list--header">
        <div class="m-list__list">
            <div class="m-list__item m-list__item--header">
                <div class="m-item m-item--list">
                    <div class="m-item__row">
                        <div class="m-item__col-header">
                        </div>
                        <div class="m-item__col-group-info m-item__col-group-info--secondary">
                            <div class="m-item__size-info"><span class="muted"><mark>32 cm</mark></span></div>
                        </div>
                        <div class="m-item__col-group-info m-item__col-group-info--secondary">
                            <div class="m-item__size-info"><mark><span class="muted">45 cm</span></mark></div>
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

<script>

prevent_add_btn_Link_Redirect();

function prevent_add_btn_Link_Redirect(){
    for(i=1;i<=<?=$pizza['Pizza']['id']?>;i++){
        document.getElementById(i).addEventListener("click", function(e){
        e.preventDefault(i);
        });
    }

    $(".pizza-size-list").hide();
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

</script>
