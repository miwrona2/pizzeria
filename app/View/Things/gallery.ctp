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
                    <?= $this->Html->image('minigal1.jpg', array('class' => 'media-object', 'onclick' => "wyswietlModal();toZdjPokaz(0)", 'alt' => 'papryka'))?>
                        <div class="media-body">
                            <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                            <div>Wpisz opis zdjęcia</div>
                             <a class="highlight pull-right" href="#">Zobacz menu</a>
                        </div>
                    </div>
                    <div class="media">
                    <?= $this->Html->image('minigal2.jpg', array('class' => 'media-object', 'onclick' => "wyswietlModal();toZdjPokaz(1)", 'alt' => 'pomidor'))?>
                        <div class="media-body">
                            <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                            <div>Wpisz opis zdjęcia</div>
                             <a class="highlight pull-right" href="#">Zobacz menu</a>
                        </div>
                    </div>
                    <div class="media">
                    <?= $this->Html->image('minigal3.jpg', array('class' => 'media-object', 'onclick' => "wyswietlModal();toZdjPokaz(2)", 'alt' => 'bazylia'))?>
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

<div id="mójModal" class="Modal">
    <div class="modal-tresc">
        <span class="zamknij" onclick="zamknijModal()">&times;</span>
            <?= $this->Html->image('gal1.jpg', array('class' => 'duzeZdjecie'))?>
            <?= $this->Html->image('gal2.jpg', array('class' => 'duzeZdjecie'))?>
            <?= $this->Html->image('gal3.jpg', array('class' => 'duzeZdjecie'))?>

        <a class="nextArrow" onclick="nastepnySlajd(1)">&gg;</a>
            <a class="beforeArrow" onclick="nastepnySlajd(-1)">&ll;</a>
 
        <div class="podpis"><p>Nazwa Obrazka</p></div>
        <div class="kafelek"><?= $this->Html->image('minigal1.jpg', array('onclick' => "toZdjPokaz(0)"))?></div>
        <div class="kafelek"><?= $this->Html->image('minigal2.jpg', array('onclick' => "toZdjPokaz(1)"))?></div>
        <div class="kafelek"><?= $this->Html->image('minigal3.jpg', array('onclick' => "toZdjPokaz(2)"))?></div>
    </div>
</div>
<script>
    var zdj = document.getElementsByClassName("duzeZdjecie");
    var kafelek = document.getElementsByClassName("kafelek");
    var slideIndex = 1;
    Pokaz(slideIndex);
    
    function wyswietlModal() {
        document.getElementById("mójModal").style.display = "block";
    }
    
    function toZdjPokaz(nr) {
        Pokaz(slideIndex = nr);
    }
    
    function Pokaz(n){
        if (n > (zdj.length - 1)){
            n = 0; 
        }
        if (n < 0) {
            n = (zdj.length-1);}
        zniknijPozostałe();
        zdj[n].style.display = "block";
        wygasPozostałe();
        podswietl(n);
        return slideIndex = n;
    }
    
    function nastepnySlajd(incr) {
        slideIndex = slideIndex + incr;
        Pokaz(slideIndex);
        console.log(slideIndex);
    }
    
    function podswietl(nr){
        kafelek[nr].style.opacity = 1;
        kafelek[nr].style.border = "solid 1px #666";
    }
    
    function zniknijPozostałe() {
        for (i=0; i<zdj.length; i++) {
            zdj[i].style.display = "none";
            kafelek[i].style.border = "none";
        }
    }
    
    function wygasPozostałe() {
        for (i=0; i<zdj.length; i++) {
            kafelek[i].style.opacity = 0.5;
        }
    }
    
    function zamknijModal() {
        document.getElementById("mójModal").style.display = "none";
    }
</script>
  