<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
/* <?= ..... ? > = <?php echo... >
$this->assign("title",...);
*/
$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?php echo $this->Html->css('foundation.min'); ?>
    <?php echo $this->Html->css('app.css'); ?>

   <?php echo $this->Html->script('vendor/jquery.js');
    echo $this->Html->script('vendor/fastclick.js');
    echo $this->Html->script('foundation.min.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('jquery-3.2.1.min'); ?>
</head>
<body>





<div class="top-bar" >
  <div class="top-bar-left">
    <ul class=" menu" >
      <li class="menu-text">FIGHTERS ARENA</li>
      <li > <?php echo $this->Html->link("Home",["controller"=>"Arenas", "action"=>"index"]);?> </li>
      <li><?php echo $this->Html->link("Login",["controller"=>"Arenas", "action"=>"login"]);?></li>
      <li> <?php echo $this->Html->link("Fighter",["controller"=>"Arenas", "action"=>"fighter"]);?></li>
      <li> <?php echo $this->Html->link("View",["controller"=>"Arenas", "action"=>"sight"]);?> </li>
      <li> <?php echo $this->Html->link("Diary",["controller"=>"Arenas", "action"=>"diary"]);?> </li>
       <li> <?php echo $this->Html->link("Messages",["controller"=>"Arenas", "action"=>"messages"]);?> </li>
    </ul>
  </div>

  </div>




    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
  <div id="footer">
            <div class='row'>
                <div class='large-12 columns'>
                    <p> SI TD 03 </p>
                </div>
            </div>
        </div>

  <script>
      $(document).foundation();
    </script>
</body>
</html>
