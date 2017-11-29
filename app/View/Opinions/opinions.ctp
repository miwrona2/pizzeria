<section class="common-part">
</section>
 
<div class="section-common">
    
    <div class="content">  
        <div class="content-header">
            <h2>Dodaj Opinię</h2>
        </div>
        <div class="content-content">
            <div class="form-center">
                <?= $this->Form->create('Opinion',array('inputDefaults' => array('label' => false))); ?>
                
                <?= $this->Form->input('id'); ?>
                <?= $this->Form->label(null, 'Komentarz: ', 'm-form_label'); ?>
                
                <?= $this->Form->input('content', array('class' => 'form-control textarea', 'cols' => '140', 'rows' => '5')); ?>
                <?= $this->Form->label(null, 'Ocena: ', 'm-form_label'); ?>
                
                <?= $this->Form->input('rate',  array('class'=> 'form-control', 'type' => 'select',
                    'options' => array(1, 2, 3, 4, 5),
                    'empty' => '(choose one)')); ?>
                <?= $this->Form->label(null, 'Imię / Nick: ', 'm-form_label'); ?>
               
                <?= $this->Form->input('nickname', array('class' => 'form-control')); ?>
                
                <?php echo $this->Recaptcha->display();
                if (isset($error_bot)) {
                    echo '<div class="error-message">' . $error_bot . '</div>';
                } ?>
                
                <?php echo $this->Form->end(array('label' => 'Wyślij', 'class' => 'btn btn-opinion')); ?>
            </div>
        </div>
    </div>
    <div class="content">  
        <div class="content-header">
            <h2>Opinie</h2>
        </div>
        <div class="content-content">
            <div class="reviews">
                <?php foreach ($records as $comment): ?>
                    <div class="review">
                        <div class="line-space">
                            <hr>
                        </div>
                        <div class="review-image"><?= $this->Html->image('avatar1.png')?></div>
                        <div class="review-contetn">
                            <div class="line">
                                <p class="nickname"><?php echo $comment['Opinion']['nickname']; ?></p>
                                <span class="rating">
                                    <small>Ocena klienta</small>
                                    <span class="stars">
                                        <i class="icon-star"></i>
                                        <?php for($s = 0; $s < $comment['Opinion']['rate']; $s++): ?>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <?php endfor; ?>
                                        <?php for($s = 0; $s < 5 - $comment['Opinion']['rate']; $s++): ?>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <?php endfor; ?>
                                    </span>
                                </span>
                            </div>
                            <time class="post-date">Opublikowano: <?php echo $comment['Opinion']['modified']; ?></time>
                            <p><?php echo $comment['Opinion']['content'].'<br>'; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>  
        </div>
    </div>
</div>
