<div class="grid-container">
<div class="grid-x align-center">
  <div class="large-6 medium-6 cell">
<table class="unstriped">
  <?php
  for($i=0;$i<$h;$i++)
  { ?>
    <tr><?php
    for($j=0;$j<$l;$j++)
    {
      if ($i== $FighterCoordY && $j== $FighterCoordX)
      {
          $char = $this->Html->image("avatars/$FighterId.jpg", ['alt' => 'avatar']);
      }
      else
      {
        if(abs($i-$FighterCoordY)+abs($j-$FighterCoordX)<=$FighterSkillSight)
        {
          $char =' ';
          foreach ($fightersTable as $f)
          {
            if($i== $f->coordinate_y && $j== $f->coordinate_x)
            {
                $char=$this->Html->image("avatars/ennemi.jpg", ['alt' => 'avatar']);
            }
          }
        }
        else
        {
          $char=$this->Html->image("decor/wall.png", ['alt' => 'wall']);;
        }

    }?>
        <td class="td-table"><?php echo $char; ?></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>
</div>
</div>

<div class="grid-x">
  <div class="large-1 medium-1"></div>
  <div class="large-1 medium-1 small-1">
<?php echo $this->Form->create();?>
<?php echo $this->Form->submit('UP',['name'=>'dir','class'=>'button']);?>
</div>
</div>
<div class="grid-x ">
 <div class="large-1 medium-1 small-12">
  <?php echo $this->Form->submit('LEFT',['name'=>'dir','class'=>'button']);?> </div>  
<div class="large-1 medium-1 small-12">
<?php echo $this->Form->submit('DOWN',['name'=>'dir','class'=>'button']);?> </div> 
<div class="large-1 medium-1 small-12">
<?php echo $this->Form->submit('RIGHT',['name'=>'dir','class'=>'button']);?> </div>
</div>
<div class="grid-x">
<?php echo $this->Form->control('attack',['type' => 'checkbox']);
echo $this->Form->end();
?></div>
</div>
</div>