<div id="additions">
    <div class="menu-section-header">
        <h5><mark>Dodatki</mark></h5>
    </div>
    <div class="m-list m-list--list">
        <ul class="m-list__list">
            <?php foreach ($additions as $addition) : ?>
                <li class="m-list__item">
                    <div class="m-item m-item--list pizza">
                        <div class="m-item__row">
                            <div class="m-item__col-header ">
                                <div><div class="m-item__header"><h4 class="m-item__title"><?= $addition['Addition']['id'] ?>-<?= $addition['Addition']['name'] ?></h4></div></div>
                                <div class="m-item__description"><span class="muted"><?= $addition['Addition']['ingredients']; ?></span></div>
                            </div>
                            <div class="m-item__col-group-info m-item__col-group-info--secondary price">
                                <span class="m-item__price"><?= $addition['Addition']['price']; ?> zł</span>
                            </div>
                            <div class="m-item__col m-item__col--secondary actions">
                                <div class="btn-group">
                                    <?php echo $this->Form->create('Main',array('id'=>'add-form-action', 'class'=> 'callFunctionAddToBoxSession','url'=>array('controller'=>'mains','action'=>'addToBoxSession')));?>
                                    <?php echo $this->Form->hidden('product_id',array('value'=> $addition['Addition']['id']))?>
                                    <?php echo $this->Form->hidden('item_name',array('value'=> $addition['Addition']['name']))?>
                                    <?php echo $this->Form->hidden('price',array('value'=> $addition['Addition']['price']))?>
                                    <?php echo $this->Form->hidden('size',array('value'=> 5))?>
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