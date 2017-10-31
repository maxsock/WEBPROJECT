<div id="hide-map" class="grid-container">
<div class="grid-x align-center">
  <div class="large-8 medium-8 small-12 cell">
<table class="unstriped">
  <?php
  for($i=0;$i<$h;$i++)
  { ?>
    <tr class="td-tables"><?php
    for($j=0;$j<$l;$j++)
    {
      if ($i== $FighterCoordY && $j== $FighterCoordX)
      {
          $char = $this->Html->image("avatars/$FighterId.jpg?=filemtime($avatar)", ['alt' => 'avatar', 'class' => 'image-size']);
      }
      else
      {
        if(abs($i-$FighterCoordY)+abs($j-$FighterCoordX)<=$FighterSkillSight)
        {
          $char =$this->Html->image("decor/view.png", ['alt' => 'view','class' => 'image-size']);
          foreach ($fightersTable as $f)
          {
            if($i== $f->coordinate_y && $j== $f->coordinate_x)
            {
                $char=$this->Html->image("avatars/ennemi.jpg", ['alt' => 'ennemi']);
            }
          }
        }
        else
        {
          $char=$this->Html->image("decor/grass.png", ['alt' => 'wall','class' => 'image-size']);
        }

    }?>
        <td class="td-tables"><?php echo $char; ?></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>
</div>
</div>

Actions left : <?php echo $actionsLeft;?>

<div class="grid-x align-center">
<?php echo $this->Form->create();?>
  <div class="cell small-2  text-center">
<?php echo $this->Form->submit('UP',['name'=>'dir','type'=>'image','src' => '/img/decor/up.png']);?>
</div>
</div>
<div class="grid-x align-center ">
<div class="cell small-1 text-right">
      <?php echo $this->Form->submit('LEFT',['name'=>'dir','type'=>'image','src' => '/img/decor/left.png']);?> 
</div>
      <div class="cell small-1 text-center ">
          <?php echo $this->Form->submit('DOWN',['name'=>'dir','type'=>'image','src' => '/img/decor/down.png']);?> 
     </div>
    

    <div class="cell small-1 text-left">
           <?php echo $this->Form->submit('RIGHT',['name'=>'dir','type'=>'image','src' => '/img/decor/right.png']);?> 
    </div>
</div>

   
<div class="grid-x align-center">
<?php echo $this->Form->control('attack',['type' => 'checkbox']);
echo $this->Form->end();
?>

</div>
</div>
</div>


<script>
    
$(function () {
   if(<?php echo $FighterCurrentHealth;?> =='0')
   {
       $("#hide-map").hide();
   }
  
} );

 </script>