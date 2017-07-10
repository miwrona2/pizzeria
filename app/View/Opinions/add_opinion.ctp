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
