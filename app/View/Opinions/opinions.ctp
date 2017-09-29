
<div class="content delivery">  
    <div class="content-header">
        <h1>opinie</h1>
    </div>
    <div class="content-content">
        <div class="reviews">
            <?php foreach ($records as $kom): ?>
                <div class="review">
                    <div class="review-rating">
                        <hr>
                        <span class="rating">
                            <small>Ocena klienta</small>
                            <span class="stars">
                                <i class="icon-star"></i>
                                <?php for($s = 0; $s < $kom['Opinion']['rate']; $s++): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <?php endfor; ?>
                                <?php for($s = 0; $s < 5 - $kom['Opinion']['rate']; $s++): ?>
                                <i class="fa fa-star-o empty" aria-hidden="true"></i>
                                <?php endfor; ?>
                            </span>
                        </span>
                    </div>
                    <div class="review-image"><?= $this->Html->image('avatar.png')?></div>
                    <div class="review-calendar">
                        <span class="wday">Piątek</span>
                        <i class="fa fa-calendar-o icon-3x" aria-hidden="true"></i>
                        <span class="day">09</span>
                        <span class="month-year">czerwiec'17</span>
                    </div>
                    <div class="review-contetn"><?php echo $kom['Opinion']['content'].'<br>'; ?><br><?php echo $kom['Opinion']['nickname'].'<br>'; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php echo $this->Html->link('dodaj_opinie' ,array('controller' => 'opinions', 'action'=> 'add_opinion'), array('class' => 'button btn')) ?>
    </div>
</div>
    
    <div class="content delivery">  
        <div class="content-header">
            <h1>dodaj opinie</h1>
        </div>

        <div class="content-content">
            <?php echo $this->Form->create('Opinion'); ?>
            <?php 
            echo $this->Form->input('id'); 
            echo $this->Form->input('content'); 
            echo $this->Form->input('rate'); 
            echo $this->Form->input('modified'); 
            echo $this->Form->input('nickname'); 
            ?>
            <?php echo $this->Form->end('Wyslij'); ?>
        </div>
    </div>

