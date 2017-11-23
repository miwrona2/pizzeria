<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>

<html lang="pl-PL">
    <head>
        <?php echo $this->Html->charset(); ?>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('style');
        echo $this->Html->css('header');
        echo $this->Html->css('footer');
        echo $this->Html->css('gallery');
        echo $this->Html->css('main');
        echo $this->Html->css('opinions');
        echo $this->Html->css('menu');
        echo $this->Html->css('contact');
        echo $this->Html->css('cart');
        echo $this->Html->script('jquery-3.2.1');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
    </head>
    <body>
        <div class="overlay" id="viewport">
            <?php include 'header.ctp'; ?>
            <div id="content">
                <?php echo $this->Flash->render(); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                        <?php echo $this->fetch('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.ctp'; ?>
        </div>
        <?php
	echo $this->Js->writeBuffer(); // Write cached scripts
	echo $this->fetch('scriptBottom');  // fetch our scritBottom
        //	echo $this->element('sql_dump');  // dump the SQL queries
        ?>
    </body>
</html>