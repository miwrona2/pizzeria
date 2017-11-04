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
                            pon. - niedz. 11:00 - 23:00
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
                <p>Strona główna</p>
                <p>Menu</p>
                <p>Opinie</p>
                <p>Kontakt</p>
                <p>Galeria</p>              
            </div>
            <div class="col4"> 
                <p class="footer-header">Dołącz do newslettera</p>
                <?= $this->Form->input(false, array('class' => 'form-control', 'cols' => '40', 'rows' => '1', 'value' => 'Wpisz tu swojego maila...')); ?>
                <?= $this->Form->button('wyślij', array('class' => 'footer-btn'));?>
            </div>
        </div>
    </div>
        <div id="footer_bottom" class="center"><p>2017. Made by adrimerie@interia.pl</p></div>
</div>
