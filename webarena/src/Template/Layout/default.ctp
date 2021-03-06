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
    <?= $this->Html->css('foundation.min'); ?>
    <?= $this->Html->css('app'); ?>

 
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script('jquery-3.2.1.min'); ?>
    <?= $this->Html->script('vendor/jquery.js');?>
    <?= $this->Html->script('foundation.min.js'); ?> 
    <?= $this->Html->script('what-input.js'); ?>
    <?= $this->Html->script('app.js'); ?>
    <?php header("Cache-Control: no-cache, must-revalidate"); ?>
   

</head>
<body>


<div class="title-bar" data-responsive-toggle="nav-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="nav-menu"></button>
  <div class="title-bar-title">  Menu</div>
</div>
   

    
<div class="top-bar" id="nav-menu">
    <ul class=" medium-horizontal vertical dropdown menu" data-responsive-menu="accordion medium-dropdown">
        
      <li > <?php echo $this->Html->link("Home",["controller"=>"Arenas", "action"=>"index"]);?> </li>
      <li><?php echo $this->Html->link("Login",["controller"=>"Arenas", "action"=>"login"]);?></li>
      <li> <?php echo $this->Html->link("Fighter",["controller"=>"Arenas", "action"=>"fighter"]);?></li>
      <li> <?php echo $this->Html->link("View",["controller"=>"Arenas", "action"=>"sight"]);?> </li>
      <li> <?php echo $this->Html->link("Diary",["controller"=>"Arenas", "action"=>"diary"]);?> </li>
      <li> <?php echo $this->Html->link("Messages",["controller"=>"Arenas", "action"=>"messages"]);?> </li>
      <li> <?php echo $this->Html->link("Guilds",["controller"=>"Arenas", "action"=>"guilds"]);?> </li>
      <li> <?php echo $this->Html->link("Logout",["controller"=>"Arenas", "action"=>"logout"]);?> </li>
    </ul>


  </div>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
  <div id="footer">
            <div class='grid-x align-center'>
                <div class='small-2 cell text-center'>
                    <p><small> SI TD 03 GLASER - LAUNET - PIVETTE - SOCK - OPTIONS BCG</small></p>
                    <p class='version'><small><?php echo $this->html->link('Link to the version log', '/webroot/versions.log'); ?></small></p>
                </div>
            </div>
        </div>

  <script>
      $(document).foundation();
      $(window).resize(function() {
    if( $(this).width() < 640 ) {
        $('#nav-menu').addClass('menu-size');
    }
     else {
         $('#nav-menu').removeClass('menu-size');
     }
    });
    </script>
</body>
</html>
