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
                <div class="thumbnails">
                    <div><?= $this->Html->image('dennis-klein-123631.jpg')?></div>
                    <div><?= $this->Html->image('obrazek3.jpg')?></div>
                    <div><?= $this->Html->image('pizza.jpg')?></div>
                    <div><?= $this->Html->image('opinions.jpg')?></div>
                    <div><?= $this->Html->image('joanna-boj-17158.jpg') ?></div>
                    <div><?= $this->Html->image('alex-jones-1246.jpg') ?></div>
                    <div><?= $this->Html->image('Alley-Street-with-Overhanging-Plants.jpg') ?></div>
                    <div><?= $this->Html->image('baehaki-hariri-364652.jpg') ?></div>                                   
                    <div><?= $this->Html->image('obrazek3.jpg')?></div>
                    <div><?= $this->Html->image('pizza.jpg')?></div>
                    <div><?= $this->Html->image('opinions.jpg')?></div>
                    <div><?= $this->Html->image('joanna-boj-17158.jpg') ?></div>
                    <div><?= $this->Html->image('alex-jones-1246.jpg') ?></div>                                                           
                </div>
            </div>
        </div>
    </div>
</section> 

<div id="theModal" class="Modal"  onclick="hideModal()">
</div>
<div class="modal-content" id="overlay">
    <span class="close-modal" onclick="hideModal()">&times;</span>
    <?= $this->Html->image('obrazek3.jpg')?>
    <?= $this->Html->image('dennis-klein-123631.jpg')?>
    <?= $this->Html->image('pizza.jpg')?>
    <?= $this->Html->image('opinions.jpg')?>
    <?= $this->Html->image('joanna-boj-17158.jpg') ?>
    <?= $this->Html->image('alex-jones-1246.jpg') ?>
    <?= $this->Html->image('Alley-Street-with-Overhanging-Plants.jpg') ?>
    <?= $this->Html->image('baehaki-hariri-364652.jpg') ?>  
    <a class="arrow-next" onclick="nextSlide(1)">&gg;</a>
    <a class="arrow-before" onclick="nextSlide(-1)">&ll;</a>
</div>

<script>

    showModal();
    
    function showModal() {
        var thumbs = document.querySelectorAll(".thumbnails > div > img");
        for (var t = 0; t < thumbs.length; t++) {
            thumbs[t].addEventListener("click",function(e) {
                displayModalandContent();
                showClickedImg(this.src);
            });
        }
    }
    
    function showClickedImg(srcOfClickedThumb) {
        var images = document.querySelectorAll(".modal-content > img");
        for (var i = 0; i < images.length; i++) {
            images[i].style.display = "none";
            if (srcOfClickedThumb === images[i].src) {
                images[i].style.display = "block";   
            }
        }
    }
    
    var overlay, theModal;
    theModal = document.getElementById("theModal");
    overlay = document.querySelector("#overlay");
    
    function displayModalandContent() {
        theModal.style.display = "block";
        overlay.style.display = "block";
    }
    
    function hideModal() {
        theModal.style.display = "none";
        overlay.style.display = "none";
    }
</script>
