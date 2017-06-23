<div class="content site-promotions">
    <div class="content-header">
        <h1>Promocje</h1>
    </div>
    <div class="content-content">
        <ul class="list-unstyled promotion-rules">
            <li>- Promocje nie łączą się</li>
        </ul>
    </div>
    <div class="promotions">
    <?php for($i=0; $i<7; $i++): ?>
    <?php
    $var = $this->Html->image('prom/'.$i.'.jpg');
    $h2 = array('Rabat 5,00 zł !', 'Kupon promocyjny', 'Happy Hours', 'Program lojalnościowy', 'Zamawiaj i Zarabiaj', '
        Druga pizza za 50 % ceny', 'Do każdej pizzy MAX sos GRATIS !!!');
    $p = array('Do pierwszego zamówienia<br>Promocja obowiązuje w: ',
        'Jeśli posiadasz kod rabatowy, wpisz go w "Koszyku" aby otrzymać zniżkę!<br>Promocja obowiązuje w: ', 
        'Super Rabat 20% do zamówienia w godz. 11-15 obowiązuje od Poniedziałku do Piątku <br>Promocja obowiązuje w: ', 
        'Zbierz 5 pieczątek, dostaniesz rabat 5,00 zł! Promocja kończy się: 31.12.2017! <br>Promocja obowiązuje w: ', 
        'Zamów za 50 zł dostaniesz Pepsi 1L Gratis !!! <br>Promocja obowiązuje w: ', 
        'Zamów dowolną Pizzę a drugą dostaniesz za Pół ceny <br>Promocja obowiązuje w: ', 
        'Zamów dowolną pizze MAX a do każdej otrzymasz twój ulubiony sos GRATIS !!! <br>Promocja obowiązuje w: ');
    $t1 = 'Tylko dostawa';
    $t2 = 'Lokal i dostawa';
    $strong = array($t1,$t2,$t1,$t1,$t1,$t1,$t2);
    ?>
        <div class="promotion clearfix">
            <div class="promotion-image">
                <?= $var;?>
            </div>
            <div class="promotion-content clearfix">
                <h2><?= $h2[$i] ?></h2>
                <p><?= $p[$i] ?><strong><?= $strong[$i] ?></strong></p>
                <table class="promotion-availibility table">
                    <thead>
                        <tr>
                            <th>pon</th>
                            <th>wto</th>
                            <th>śro</th>
                            <th>czw</th>
                            <th>pt</th>
                            <th>sob</th>
                            <th>niedz</th>
                        </tr>
                        <tr>
                            <?php for($j=0; $j<7; $j++):?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php endfor;?>
                        </tr>
                    </thead>
                </table>
                <a href="#" class="button">Menu</a>
            </div>
        </div>
    <?php endfor; ?>
    </div>  
</div>