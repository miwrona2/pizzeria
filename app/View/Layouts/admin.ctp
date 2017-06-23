<header>
    <?php
echo $this->Html->css('header');
echo $this->fetch('css');    
?>
    <style>
        body{
            background: lightgoldenrodyellow;
        }
    </style>
    
</header>

<?php include 'header.ctp'; ?>
<?php echo $this->fetch('content'); ?>
<br><br><br><br><hr><br>
<?php include 'footer.ctp'; ?>



