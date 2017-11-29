<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="carousel">
                <span onclick="previous()" class="carousel-left"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></span>
                <span onclick="next()" class="carousel-right"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></span>
                <?= $this->Html->image('slider/dogancan-ozturan-395.jpg', array('class' => 'mainImg')) ?>
                <?= $this->Html->image('slider/fresh-pizza-1508087186BXk.jpg', array('class' => 'mainImg')) ?>
                <?= $this->Html->image('slider/Alley-Street-with-Overhanging-Plants.jpg', array('class' => 'mainImg')) ?>
                <?= $this->Html->image('slider/david-nuescheler-140505.jpg', array('class' => 'mainImg')) ?>
                <?= $this->Html->image('slider/john-towner-125993.jpg', array('class' => 'mainImg')) ?>
                <ol class="carousel-indicators">
                    <li onclick="pointSlide(1)"></li>
                    <li onclick="pointSlide(2)"></li>
                    <li onclick="pointSlide(3)"></li>
                    <li onclick="pointSlide(4)"></li>
                    <li onclick="pointSlide(5)"></li>
                </ol>
            </div>
            <div class="section-common">
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
                            <?= $this->Html->image('travis-yewell-381664.jpg') ?>
                        </div>
                    </div>
                    <div class="redirect-button">
                        <?php echo $this->Html->link('Przejdź do menu', array('controller' => 'mains', 'action' => 'menu'),array('class' => 'section-btn', 'escape' => false)); ?>
                    </div>
                </div>   
                <div class="section-main">
                    <div class="section-header"> 
                        <h2>Jak do nas trafić</h2>  
                    </div>   
                    <div class="section-content section-content-contact">
                        <div class="map-wrapper">
                            <?= $this->Html->image('street.bmp', array('class' => 'map-img')) ?>
                        </div>
                        <div class="wrapper">
                            <ul class="contact-list">
                                <li class="contact-list-el">Przyjdź do naszego lokalu w Montpellier na ulicy Rue Saint-Guilhem 3</li>
                                <li class="contact-list-el">Zamów telefonicznie pod nr 892 232 983</li>
                                <li class="contact-list-el">Zamów online w zakładce 'Menu'</li>
                            </ul>
                        </div>
                    </div>
                    <div class="redirect-button">
                        <?php echo $this->Html->link('Kontakt', array('controller' => 'mains', 'action' => 'contact'),array('class' => 'section-btn', 'escape' => false)); ?>
                    </div>
                </div>   
                <div class="section-main">
                    <div class="section-header"> 
                        <h2>Opinie o nas</h2>  
                    </div>   
                    <div class="section-content section-content-opinion">
                        <span class="nickname"><?= $displayLastOpinion['Opinion']['nickname'];?></span>
                        <time class="post-date pull-right"><?= $displayLastOpinion['Opinion']['modified'];?></time>
                        <p class="post-content"><?= $displayLastOpinion['Opinion']['content'];?></p>
                    </div>
                    <div class="redirect-button">
                        <?php echo $this->Html->link('Zobacz wszystkie opinie', array('controller' => 'opinions', 'action' => 'opinions'),array('class' => 'section-btn', 'escape' => false)); ?>
                    </div>
                </div>   
                <div class="section-main">
                    <div class="section-header"> 
                        <h2>Zdjęcia</h2>  
                    </div>   
                    <div class="section-content">
                        <div class="mp-thumbnails-gal">
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('salami-2645403_1920.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('joanna-boj-17158.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('alex-jones-1246.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('Alley-Street-with-Overhanging-Plants.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('baehaki-hariri-364652.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('clem-onojeghuo-175917.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('joanna-boj-17158.jpg') ?></div>
                            <div class="mp-thumbnail-gal"><?= $this->Html->image('tomato.jpg') ?></div>
                        </div>
                    </div>
                    <div class="redirect-button">
                        <?php echo $this->Html->link('Galeria', array('controller' => 'mains', 'action' => 'gallery'),array('class' => 'section-btn', 'escape' => false)); ?>
                    </div>
                </div>   
            </div>   
        </div>   
    </div>
</div>
<script>
window.onload = slide_change(nr=0);
var timer1 = 0;

function previous(){
        force_slide(nr-2);
}

function next(){
        force_slide(nr);
}

function pointSlide(a) {
    force_slide(a-1);
}

function force_slide(slide_nr){
        nr = slide_nr;
        slide_change(nr);
}

function slide_change() {

    var allImages = document.querySelectorAll('.carousel img');
    var indicators = document.querySelectorAll('.carousel-indicators li');

    if (nr > allImages.length-1) nr = 0; 
    if (nr < 0) {nr = allImages.length-1;}

    for (var i=0; i < allImages.length; i++) {
        allImages[i].style.display = 'none';
        indicators[i].classList.remove("marked");
    }

    allImages[nr].style.display = "block";
    indicators[nr].classList.add("marked");

    clearTimeout(timer1);
    timer1 = setTimeout("slide_change()", 4000);
    nr++;
}
 
</script>
