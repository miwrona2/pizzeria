<section class="common-part">
    <h1>galeria</h1>
</section> 
<div class="content gallery">  
    <div class="content-header">
        <h1>galeria</h1>
    </div>
    <div class="content-content">
        <div class="media">
        <?= $this->Html->link($this->Html->image('preview_0.jpeg', array('class' => 'media-object')), 'img0', array('escape' => false, 'class' => 'float-sm-left'))?>
            <div class="media-body">
                <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                <div>Wpisz opis zdjęcia</div>
                 <a class="highlight pull-right" href="#">Zobacz menu</a>
            </div>
        </div>
        <div class="media">
        <?= $this->Html->link($this->Html->image('preview_1.jpeg', array('class' => 'media-object')), 'img1', array('escape' => false, 'class' => 'float-sm-left'))?>
            <div class="media-body">
                <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                <div>Wpisz opis zdjęcia</div>
                 <a class="highlight pull-right" href="#">Zobacz menu</a>
            </div>
        </div>
        <div class="media">
        <?= $this->Html->link($this->Html->image('preview_2.jpeg', array('class' => 'media-object')), '2.jpeg', array('escape' => false, 'class' => 'float-sm-left'))?>
            <div class="media-body">
                <h4 class="media-heading">Wpisz tytuł zdjęcia</h4>
                <div>Wpisz opis zdjęcia</div>
                 <a class="highlight pull-right" href="#">Zobacz menu</a>
            </div>
        </div>
    </div>
</div>