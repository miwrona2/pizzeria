
<div id="header">
    <div class="header-wrapper">
        <div class="navigation">
            <div class="logo-container"><?php echo $this->Html->link($this->Html->image('logo.png', array('class' => 'logo')), 
                            array('controller' => 'pages', 'action' => 'home'), array('escape' => false)); ?>
            </div>   
            <ul>
                <li><?php echo $this->Html->link('STRONA GŁÓWNA', array('controller' => 'pages', 'action' => 'home'),array('class' => 'elements', 'onclick' => "markElement(event)")); ?></li>
                <li list_el_numb="second"><?php echo $this->Html->link('MENU', array('controller' => 'things', 'action' => 'menu'),array('class' => 'elements', 'onclick' => "markElement(event)")); ?></li>
                <li><?php echo $this->Html->link('OPINIE', array('controller' => 'opinions', 'action' => 'opinions'),array('class' => 'elements', 'onclick' => "markElement(event)")); ?></li>
                <li><?php echo $this->Html->link('DOSTAWA', array('controller' => 'things', 'action' => 'delivery'),array('class' => 'elements', 'onclick' => "markElement(event)")); ?></li>
                <li><?php echo $this->Html->link('KONTAKT', array('controller' => 'things', 'action' => 'contact'),array('class' => 'elements', 'onclick' => "markElement(event)")); ?></li>
                <li><?php echo $this->Html->link('GALERIA', array('controller' => 'things', 'action' => 'gallery'),array('class' => 'elements', 'onclick' => "markElement(event)")); ?></li>
            </ul>
        </div>
    </div>
</div>  


<script>
function markElement(evt) {
    var i, elements;
    elements = document.getElementsByClassName("elements");
    for (i = 0; i < elements.length; i++) {
        elements[i].className = elements[i].className.replace(" active", "");
    }
    evt.currentTarget.className += " active";
}

function markElementOnLoad(){
    var ii, el, pathname;
    el = document.getElementsByClassName("elements");
    pathname = window.location.pathname;
    for (ii = 0; ii < el.length; ii++) {
        var umpteenth_el = el[ii].getAttribute("href");
        if (pathname === umpteenth_el) {
            el[ii].className += " active";
            break;
        }
    }
}

window.onload = markElementOnLoad();
</script>