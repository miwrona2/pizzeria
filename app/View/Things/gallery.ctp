<section class="common-part">
    <h1>galeria</h1>
</section> 

<section class="section-common">
    <div class="content">
        <div class="content-header">
            <h2>Galeria</h2>
        </div>

        <div class="content gallery">  
            <div class="content-content">
                <div class="media">
                <?= $this->Html->image('minigal1.jpg', array('class' => 'media-object', 'onclick' => "displayModal();showThisPhoto(0)"))?>
                </div>
                <div class="media">
                <?= $this->Html->image('minigal2.jpg', array('class' => 'media-object', 'onclick' => "displayModal();showThisPhoto(1)"))?>
                </div>
                <div class="media">
                <?= $this->Html->image('minigal3.jpg', array('class' => 'media-object', 'onclick' => "displayModal();showThisPhoto(2)"))?>
                </div>
            </div>
        </div>
    </div>
</section> 




<div id="theModal" class="Modal">
    <div class="modal-content">
        <div class="underlay">
            <span class="close-modal" onclick="hideModal()">&times;</span>

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
            tile[i].style.opacity = 0.9;
        }
    }
    
    function hideModal() {
        document.getElementById("theModal").style.display = "none";
    }
</script>
  