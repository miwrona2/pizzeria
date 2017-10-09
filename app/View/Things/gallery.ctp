<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <div class="background pizza">
                </div>
            </div>
            <div class="content gallery">  
                <div class="content-header">
                    <h1>galeria</h1>
                </div>
                <div class="content-content">
                    <div class="media">
                    <?= $this->Html->image('minigal1.jpg', array('class' => 'media-object', 'onclick' => "displayModal();showThisPhoto(0)"))?>
                        <div class="media-body">
                            <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                            <div>Wpisz opis zdjęcia</div>
                            <a class="highlight pull-right" href="#">Zobacz menu</a>
                        </div>
                    </div>
                    <div class="media">
                    <?= $this->Html->image('minigal2.jpg', array('class' => 'media-object', 'onclick' => "displayModal();showThisPhoto(1)"))?>
                        <div class="media-body">
                            <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                            <div>Wpisz opis zdjęcia</div>
                            <a class="highlight pull-right" href="#">Zobacz menu</a>
                        </div>
                    </div>
                    <div class="media">
                    <?= $this->Html->image('minigal3.jpg', array('class' => 'media-object', 'onclick' => "displayModal();showThisPhoto(2)"))?>
                        <div class="media-body">
                            <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                            <div>Wpisz opis zdjęcia</div>
                            <a class="highlight pull-right" href="#">Zobacz menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="theModal" class="Modal">
    <span class="close-modal" onclick="hideModal()">&times;</span>
    <div class="modal-content">
            <?= $this->Html->image('gal1.jpg', array('class' => 'mainPhoto', 'alt' => 'papryka'))?>
            <?= $this->Html->image('gal2.jpg', array('class' => 'mainPhoto', 'alt' => 'pomidor'))?>
            <?= $this->Html->image('gal3.jpg', array('class' => 'mainPhoto', 'alt' => 'bazylia'))?>

        <a class="arrow-next" onclick="nextSlide(1)">&gg;</a>
        <a class="arrow-before" onclick="nextSlide(-1)">&ll;</a>
 
        <div class="caption"><p id="caption">Name of current picture</p></div>
        <div class="preview-photo"><?= $this->Html->image('minigal1.jpg', array('onclick' => "showThisPhoto(0)"))?></div>
        <div class="preview-photo"><?= $this->Html->image('minigal2.jpg', array('onclick' => "showThisPhoto(1)"))?></div>
        <div class="preview-photo"><?= $this->Html->image('minigal3.jpg', array('onclick' => "showThisPhoto(2)"))?></div>
    </div>
</div>
<script>
    var slide = document.getElementsByClassName("mainPhoto");
    var tile = document.getElementsByClassName("preview-photo");
    var caption = document.getElementById("caption");
    var slideIndex = 1;
    showPhoto(slideIndex);
    
    function displayModal() {
        document.getElementById("theModal").style.display = "block";
    }
    
    function showThisPhoto(n) {
        showPhoto(slideIndex = n);
    }
    
    function showPhoto(n){
        if (n > (slide.length - 1)){
            n = 0; 
        }
        if (n < 0) {
            n = (slide.length-1);}
        hideOtherSlides();
        slide[n].style.display = "block";
        dimOthers();
        highlight(n);
        caption_photo(n);
        return slideIndex = n;
    }
    
    function nextSlide(incr) {
        slideIndex = slideIndex + incr;
        showPhoto(slideIndex);
    }
    
    function highlight(n){
        tile[n].style.opacity = 1;
        tile[n].style.border = "solid 1px #666";
    }
    
    function caption_photo(n){
        caption.innerHTML = (slide[n].alt);
    }
    
    function hideOtherSlides() {
        for (i=0; i<slide.length; i++) {
            slide[i].style.display = "none";
            tile[i].style.border = "none";
        }
    }
    
    function dimOthers() {
        for (i=0; i<slide.length; i++) {
            tile[i].style.opacity = 0.5;
        }
    }
    
    function hideModal() {
        document.getElementById("theModal").style.display = "none";
    }
</script>
  