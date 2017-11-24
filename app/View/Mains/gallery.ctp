<section class="common-part">
</section> 

<section class="section-common">
    <div class="content">
        <div class="content-header">
            <h2>Galeria</h2>
        </div>
            <div class="content-content">
                <div class="thumbnails">
                    <div><?= $this->Html->image('dennis-klein-123631.jpg')?></div>
                    <div><?= $this->Html->image('pizza.jpg')?></div>
                    <div><?= $this->Html->image('opinions.jpg')?></div>
                    <div><?= $this->Html->image('joanna-boj-17158.jpg') ?></div>
                    <div><?= $this->Html->image('alex-jones-1246.jpg') ?></div>
                    <div><?= $this->Html->image('Alley-Street-with-Overhanging-Plants.jpg') ?></div>
                    <div><?= $this->Html->image('baehaki-hariri-364652.jpg') ?></div>                                   
                    <div><?= $this->Html->image('jakub-kapusnak-296881.jpg')?></div>
                    <div><?= $this->Html->image('michal-kubalczyk-261748.jpg')?></div>
                    <div><?= $this->Html->image('pizza-time-picjumbo-com.jpg')?></div>
                    <div><?= $this->Html->image('thomas-schweighofer-51101.jpg') ?></div>
                    <div><?= $this->Html->image('carissa-gan-76325.jpg') ?></div>                                                           
                    <div><?= $this->Html->image('nirzar-pangarkar-31451.jpg') ?></div>                                                           
                </div>
            </div>
    </div>
</section> 

<div id="theModal" class="Modal"  onclick="hideModal()">
</div>
<div class="modal-content" id="overlay">
    <span class="close-modal" onclick="hideModal()">&times;</span>
    <?= $this->Html->image('dennis-klein-123631.jpg')?>
    <?= $this->Html->image('pizza.jpg')?>
    <?= $this->Html->image('opinions.jpg')?>
    <?= $this->Html->image('joanna-boj-17158.jpg') ?>
    <?= $this->Html->image('alex-jones-1246.jpg') ?>
    <?= $this->Html->image('Alley-Street-with-Overhanging-Plants.jpg') ?>
    <?= $this->Html->image('baehaki-hariri-364652.jpg') ?>  
    <?= $this->Html->image('jakub-kapusnak-296881.jpg')?>
    <?= $this->Html->image('michal-kubalczyk-261748.jpg')?>
    <?= $this->Html->image('pizza-time-picjumbo-com.jpg')?>
    <?= $this->Html->image('thomas-schweighofer-51101.jpg') ?>
    <?= $this->Html->image('carissa-gan-76325.jpg') ?>                                                           
    <?= $this->Html->image('nirzar-pangarkar-31451.jpg') ?>    
    <a class="arrow-next" ><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></a>
    <a class="arrow-before"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
</div>
<script>

    showModal();
    forceNext();
    forcePrevious();
    
    function forceNext(){
        document.querySelector(".arrow-next").addEventListener("click", function(e){
            for (var i=0; i<this.parentNode.children.length; i++) {
                if (this.parentNode.children[i].getAttribute("style") === "display: block;") {
                    return showClickedImg(false, i);
                } 
            }
        });
    }
    
    function forcePrevious(){
        document.querySelector(".arrow-before").addEventListener("click", function(e){
            for (var i=0; i<this.parentNode.children.length; i++) {
                if (this.parentNode.children[i].getAttribute("style") === "display: block;") {
                    return showClickedImg(false, i-2);
                } 
            }
        });
    }
    
    function showModal() {
        var nr = 1;
        var thumbs = document.querySelectorAll(".thumbnails > div > img");
        for (var t = 0; t < thumbs.length; t++) {
            thumbs[t].addEventListener("click",function(e) {
                displayModalandContent();
                showClickedImg(this.src, nr);
            });
        }
    }
    
    function showClickedImg(srcOfClickedThumb, nr) {
        var images = document.querySelectorAll(".modal-content > img");
        for (var i = 0; i < images.length; i++) {
            images[i].style.display = "none";
            if (srcOfClickedThumb === images[i].src) {
                images[i].style.display = "block";   
            } else if (srcOfClickedThumb === false){
                if(nr>(images.length-1)) nr = 1;
                if (nr < 1) nr = images.length - 1 ;
                images[nr].style.display = "block";   
            }
        }
    }
    
    function nextSlide(nr, images) {
        console.log(images[nr]);
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
