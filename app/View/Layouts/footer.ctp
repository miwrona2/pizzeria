<div id="footer">
    <div class="footer-content">
        <div id="full">
            <div class="col1">  
                <p class="footer-header">Pizzeria Catania</p>
                <div class='post-address'>
                        20-552 Lublin<br>
                        ul. Kawaleryjska 4 A<br>
                </div>
                <div class="opening-hours">
                    <strong class="opening-hours__heading">Godziny otwarcia: </strong>
                    <ul class="list-unstyled">
                        <li>
                            pon. - pt. 11:00 - 23:00
                        </li>
                        <li>
                            sob. - niedz. 11:00 - 24:00
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col2">  
                <p class="footer-header">Skontaktuj się z nami</p>
                <p>Nr tel: 892 232 983</p>
                <p>Adres e-mail: pizzeria_catania@wp.pl</p>
                <div class="social">
                    <i class="fa fa-tripadvisor fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-snapchat fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
                </div>
            </div>               
            <div class="col3">  
                <p class="footer-header">Mapa Strony</p>     
                <?php echo $this->Html->link('<p>Strona Główna</p>', array('controller' => 'pages', 'action' => 'home'),array('class' => 'subpage', 'escape' => false)); ?>
                <?php echo $this->Html->link('<p>Menu</p>', array('controller' => 'things', 'action' => 'menu'),array('class' => 'subpage', 'escape' => false)); ?>
                <?php echo $this->Html->link('<p>Opinie</p>', array('controller' => 'opinions', 'action' => 'opinions'),array('class' => 'subpage', 'escape' => false)); ?>
                <?php echo $this->Html->link('<p>Kontakt</p>', array('controller' => 'things', 'action' => 'contact'),array('class' => 'subpage', 'escape' => false)); ?>
                <?php echo $this->Html->link('<p>Galeria</p>', array('controller' => 'things', 'action' => 'gallery'),array('class' => 'subpage', 'escape' => false)); ?>            
            </div>
            <div class="col4"> 
                <p class="footer-header">Dołącz do newslettera</p>
                <?= $this->Form->create('Newsletter'); ?>

                <?= $this->Form->input('email', array('label'=> false ,'class' => 'form-control', 'cols' => '40', 'rows' => '1', 'value' => 'mail@gmail.com')); ?>
                
                <?php echo $this->Form->end(array('label' => 'Wyślij', 'class' => 'footer-btn')); ?>
            </div>
        </div>
    </div>
        <div id="footer_bottom" class="center"><p>2017. Made by adrimerie@interia.pl</p></div>
</div>
