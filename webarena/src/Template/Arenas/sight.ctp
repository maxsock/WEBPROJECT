<div class="grid-container">
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
          $char = $this->Html->image("avatars/$FighterId.jpg?=filemtime($avatar)", ['alt' => 'avatar']);
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

<div class="grid-x align-center">
<?php echo $this->Form->create();?>
  <div class="cell small-2  text-center">
<?php echo $this->Form->submit('UP',['name'=>'dir','class'=>'button large']);?>
</div>
</div>
<div class="grid-x align-center ">
<div class="cell small-2 text-center ">
      <?php echo $this->Form->submit('LEFT',['name'=>'dir','class'=>'button large']);?> 
</div>
    <div class="cell small-2 text-center">
           <?php echo $this->Form->submit('RIGHT',['name'=>'dir','class'=>'button large']);?> 
    </div>
</div>
 <div class="grid-x align-center ">
     <div class="cell small-4 text-center ">
          <?php echo $this->Form->submit('DOWN',['name'=>'dir','class'=>'button large ']);?> 
     </div>
    
</div>
<div class="grid-x align-center">
<?php echo $this->Form->control('attack',['type' => 'checkbox']);
echo $this->Form->end();
?>
<span class="show-for-sr">Download Kittens</span>
</div>
</div>
</div>