Bienvenue <?php echo $myname;?> dans WebArena
<br> <a href="login">login</a>
<?php echo $test;?>
<?php echo $this->Html->link("click",["controller"=>"Arenas", "action"=>"fighter"]);?>

<?php echo $this->Form->create();
echo $this->Form->control("salut");
echo $this->Form->submit();
echo $this->Form->end();?>