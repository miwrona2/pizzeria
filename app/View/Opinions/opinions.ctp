<section class="common-part">
    <h1>opinie</h1>
</section>
<div class="opinions">
    <div class="content">  
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
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <?php endfor; ?>
                                </span>
                            </span>
                        </div>
                        <div class="review-image"><?= $this->Html->image('avatar1.png')?></div>
<!--                        <div class="review-calendar">
                            <span class="wday">Piątek</span>
                            <i class="fa fa-calendar-o icon-3x" aria-hidden="true"></i>
                            <span class="day">09</span>
                            <span class="month-year">czerwiec'17</span>
                        </div>-->
                        <div class="review-contetn">
                            <p class="nickname"><?php echo $kom['Opinion']['nickname']; ?></p>
                            <time class="post-date">Opublikowano: <?php echo $kom['Opinion']['modified']; ?></time>
                            <p><?php echo $kom['Opinion']['content'].'<br>'; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>  
        </div>
    </div>
    
    <div class="content">  
        <div class="content-header">
            <h1>dodaj opinie</h1>
        </div>

        <div class="content-content">
            <div class="form-center">
                
                <?= $this->Form->create('Opinion',array('inputDefaults' => array('label' => false))); ?>
                
                <?= $this->Form->input('id'); ?>
                <?= $this->Form->label(null, 'Komentarz: ', 'm-form_label'); ?>
                
                <?= $this->Form->input('content', array('class' => 'form-control', 'cols' => '100', 'rows' => '5')); ?>
                <?= $this->Form->label(null, 'Ocena: ', 'm-form_label'); ?>
                
                <?= $this->Form->input('rate',  array('class'=> 'form-control', 'type' => 'select',
                    'options' => array(1, 2, 3, 4, 5),
                    'empty' => '(choose one)')); ?>
                <?= $this->Form->label(null, 'Imię / Nick: ', 'm-form_label'); ?>
               
                <?= $this->Form->input('nickname', array('class' => 'form-control')); ?>
                                
                <?php echo $this->Form->end(array('label' => 'Wyślij', 'class' => 'btn btn-opinion')); ?>
            </div>
            <h3 style="color:red; font-weight: bold">tutaj dodam reCaptchę</h3>
        </div>
    </div>
</div>
