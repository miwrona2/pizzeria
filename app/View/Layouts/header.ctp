

<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->

<div id="header">
    <div class="header container">
        <div class="row">
            <div class="logo-container"><?php echo $this->Html->link($this->Html->image('1411672961.png', array('class' => 'logo')), 
                    array('controller' => 'things', 'action' => 'index'), array('escape' => false)); ?></div>
            <div class="restaurant-name">
                <?php
                echo $this->Html->link('<p>Restauracja &amp; Pizzeria</p>'
                        . '<h1>Pizzeria Salsa</h1>', array('controller' => 'things', 'action' => 'index'), array('escape' => false));
                ?>
            </div>
        </div>
    </div>
    <div class="navigation container">
        <ul>
            <li class="dropdown"><?php echo $this->Html->link('START <span class="caret"></span>', '#', 
                    array('class' => 'dropdown-toggle', 'escape' => false)); ?>
                <ul class="dropdown-menu"> 
                    <li><?php echo $this->Html->link('STRONA GŁÓWNA', array('controller' => 'things', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link('OPINIE', array('controller' => 'things', 'action' => 'opinions')); ?></li>
                </ul>
            </li>
            <li><?php echo $this->Html->link('MENU', array('controller' => 'things', 'action' => 'menu')); ?></li>
            <li><?php echo $this->Html->link('PROMOCJE', array('controller' => 'things', 'action' => 'discount')); ?></li>
            <li><?php echo $this->Html->link('DOSTAWA', array('controller' => 'things', 'action' => 'delivery')); ?></li>
            <li><?php echo $this->Html->link('KONTAKT', array('controller' => 'things', 'action' => 'contact')); ?></li>
            <li><?php echo $this->Html->link('GALERIA', array('controller' => 'things', 'action' => 'gallery')); ?></li>
            <li><?php echo $this->Html->link('ALERGENY', array('controller' => 'things', 'action' => 'allergens')); ?></li>
            <li><?php echo $this->Html->link('Product', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('BoxItems', array('controller' => 'BoxItems', 'action' => 'index')); ?></li>
        </ul>
    </div>
</div>  

<script>
$(function()
{
    $('.dropdown-toggle').on('click',function(){
        $('.dropdown-menu').toggle();
    });
});
</script>
