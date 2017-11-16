<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="carousel">
                <span class="carousel-left">&ll;</span>
                <span class="carousel-right">&gg;</span>
                <?= $this->Html->image('jeremy-bishop-151467.jpg', array('class' => 'mySlides', 'style' => 'width:100%')) ?>
                <?= $this->Html->image('slider/2.jpg', array('class' => 'mySlides', 'style' => 'width:100%')) ?>
                <?= $this->Html->image('slider/3.jpg', array('class' => 'mySlides', 'style' => 'width:100%')) ?>
                <?= $this->Html->image('slider/4.jpg', array('class' => 'mySlides', 'style' => 'width:100%')) ?>
                <?= $this->Html->image('slider/5.jpg', array('class' => 'mySlides', 'style' => 'width:100%')) ?>
                <ol class="carousel-indicators">
                    <li class="demo" onclick="currentDiv(1)" style="cursor:pointer;"></li>
                    <li class="demo" onclick="currentDiv(2)" style="cursor:pointer;"></li>
                    <li class="demo" onclick="currentDiv(3)" style="cursor:pointer;"></li>
                    <li class="demo" onclick="currentDiv(4)" style="cursor:pointer;"></li>
                    <li class="demo" onclick="currentDiv(5)" style="cursor:pointer;"></li>
                </ol>
            </div>
            <div class="section-main">
                <div class="section-header"> 
                <h2>Oferujemy</h2>  
                </div>   
                <div class="section-content mp-thumbnails">
                    <div class="mp-thumbnail">
                        <h3>Pizze</h3>
                        <?= $this->Html->image('pizza.jpg') ?>
                    </div>
                    <div class="mp-thumbnail">
                        <h3>Pasty</h3>
                        <?= $this->Html->image('pasta.jpg') ?>
                    </div>
                    <div class="mp-thumbnail">
                        <h3>Sałatki</h3>
                        <?= $this->Html->image('dennis-klein-123631.jpg') ?>
                    </div>
                </div>
                    <p>Zamów posiłek telefonicznie lub online - przejdź do menu</p>
                <div class="redirect-opinion">
                    <?php echo $this->Html->link('Przejdź do menu', array('controller' => 'things', 'action' => 'menu'),array('class' => 'section-btn', 'escape' => false)); ?>
                </div>
            </div>   
            <div class="section-main">
                <div class="section-header"> 
                <h2>opinie o nas</h2>  
                </div>   
                <div class="section-content">
                    <span class="nickname"><?= $displayLastOpinion['Opinion']['nickname'];?></span>
                    <time class="post-date pull-right"><?= $displayLastOpinion['Opinion']['modified'];?></time>
                    <p class="post-content"><?= $displayLastOpinion['Opinion']['content'];?></p>
                </div>
                <div class="redirect-opinion">
                    <?php echo $this->Html->link('Zobacz wszystkie opinie', array('controller' => 'opinions', 'action' => 'opinions'),array('class' => 'section-btn', 'escape' => false)); ?>
                </div>
            </div>   
            <div class="section-main">
                <div class="section-header"> 
                <h2>Jak do nas trafić</h2>  
                </div>   
                <div class="section-content section-content-contact">
                    <?= $this->Html->image('street.bmp', array('class' => 'map-img')) ?>
                    <div class="wrapper">
                        <ul class="contact-list">
                            <li class="contact-list-el">Przyjdź do naszego lokalu w Montpellier na ulicy Rue Saint-Guilhem 3</li>
                            <li class="contact-list-el">Zamów telefonicznie pod nr 892 232 983</li>
                            <li class="contact-list-el">Zamów online w zakładce 'Menu'</li>
                        </ul>
                    </div>
                </div>
                <div class="redirect-opinion">
                    <?php echo $this->Html->link('Kontakt', array('controller' => 'things', 'action' => 'contact'),array('class' => 'section-btn', 'escape' => false)); ?>
                </div>
            </div>   
            <div class="section-main">
                <div class="section-header"> 
                <h2>Zdjęcia</h2>  
                </div>   
                <div class="section-content mp-thumbnails">
                    <div class="mp-thumbnail">
                        <?= $this->Html->image('joanna-boj-17158.jpg') ?>
                        <?= $this->Html->image('alex-jones-1246.jpg') ?>
                        <?= $this->Html->image('Alley-Street-with-Overhanging-Plants.jpg') ?>
                        <?= $this->Html->image('baehaki-hariri-364652.jpg') ?>
                        <?= $this->Html->image('clem-onojeghuo-175917.jpg') ?>
                        <?= $this->Html->image('darren-coleshill-178479.jpg') ?>
                    </div>
                </div>
                <div class="redirect-opinion">
                    <?php echo $this->Html->link('Galeria', array('controller' => 'things', 'action' => 'gallery'),array('class' => 'section-btn', 'escape' => false)); ?>
                </div>
            </div>   
        </div>   
    </div>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
            $(x[i]).hide();
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
        $(x[slideIndex-1]).show();
    }

    dots[slideIndex-1].className += " w3-white";
}
</script>
