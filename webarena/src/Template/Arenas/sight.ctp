
<?php
echo $this->Form->create();
echo $this->Form->control('attack',['type' => 'checkbox']);
echo $this->Form->submit('GO UP',['name'=>'dir']);
echo $this->Form->submit('GO DOWN',['name'=>'dir']);
echo $this->Form->submit('GO RIGHT',['name'=>'dir']);
echo $this->Form->submit('GO LEFT',['name'=>'dir']);
echo $this->Form->control('attack',['type' => 'checkbox']);
echo $this->Form->end();
?>

<table>
  <?php for($i=0;$i<$h;$i++) { ?>
    <tr>
      <?php for($j=0;$j<$l;$j++){
        if ($i== $FighterCoordY && $j== $FighterCoordX){
          $char = 'P';
        }else{
          $char ='.';
        }?>
        <td><?php echo $char; ?></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>
