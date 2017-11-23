<div id="sauces">
    <div class="menu-section-header">
        <h5><mark>Sosy</mark></h5>
    </div>
    <div class="m-list m-list--list">
        <ul class="m-list__list">
            <?php foreach ($sauces as $sauce) : ?>
                <li class="m-list__item">
                    <div class="m-item m-item--list pizza">
                        <div class="m-item__row">
                            <div class="m-item__col-header ">
                                <div><div class="m-item__header"><h4 class="m-item__title"><mark><?= $sauce['Sauce']['id'] ?>-<?= $sauce['Sauce']['name'] ?></mark></h4></div></div>
                                <div class="m-item__description"><span class="muted"><mark class="inside-muted"><?= $sauce['Sauce']['ingredients']; ?></mark></span></div>
                            </div>
                            <div class="m-item__col-group-info m-item__col-group-info--secondary price">
                                <mark><span class="m-item__price"><?= $sauce['Sauce']['price']; ?> zł</span></mark>
                            </div>
                            <div class="m-item__col m-item__col--secondary actions">
                                <div class="btn-group">
                                    <?php echo $this->Form->create('Thing',array('id'=>'add-form-action', 'class'=> 'callFunctionAddToBoxSession','url'=>array('controller'=>'things','action'=>'addToBoxSession')));?>
                                    <?php echo $this->Form->hidden('product_id',array('value'=> $sauce['Sauce']['id']))?>
                                    <?php echo $this->Form->hidden('item_name',array('value'=> $sauce['Sauce']['name']))?>
                                    <?php echo $this->Form->hidden('price',array('value'=> $sauce['Sauce']['price']))?>
                                    <?php echo $this->Form->hidden('size',array('value'=> 6))?>
                                    <?php echo $this->Form->submit('Do koszyka',array('class'=>'single-btn'));?>
                                    <?php echo $this->Form->end();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>