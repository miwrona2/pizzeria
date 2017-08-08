
<div class="content-content">
    <table>
            <tr>
                <th colspan="2"></th>
                <th>30 cm</th>
                <th>42 cm</th>

            </tr>   
        <?php foreach($products as $pizza): ?>
            <tr>
                <td colspan="2"><?php echo $pizza['Product']['id'] ." - ". $pizza['Product']['name']; ?></td>
                <td><?php echo $pizza['Product']['price_m']; ?></td>
                <td><?php echo $pizza['Product']['price_d']; ?></td>
                <td><?php echo $this->Form->submit('Do koszyka') ?><td/>
            </tr>
                <td><?php echo $pizza['Product']['ingredients']; ?></td>
        <?php endforeach; ?>
        <?php unset($pizza); ?>
    </table>
</div>