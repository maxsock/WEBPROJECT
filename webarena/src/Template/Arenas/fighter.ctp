
<div class="grid-container background cell">
<div class="grid-x margin-x">
  <div class="large-2 medium-1 small-1 cell">
<?php echo $this->Html->image("avatars/$FighterId.jpg?=filemtime($FighterId.jpg)", ['alt' => 'avatar','class'=>'th [radius]']); ?> </div> 
 <div class="large-10 medium-1 small-1 cell ">
<ul class="no-bullet">
    <div class="grid-x text-center">
    <div class=" large-12 cell">
        <li> <h2> <?php echo $FighterName;?> </h2> </li> 
    </div>
    </div>
    <div class="grid-x margin-x">
    <div class="large-2 medium-1 small-1 cell">
    <li> Level :  <?php echo $FighterLevel;?> </li>
    </div>
    <div class="large-2 medium-1 small-1 cell">
    <li> Xp :  <?php echo $FighterXp;?> </li>
    </div>
    <div class="large-2 medium-1 small-1 cell">
    <li> Sight : <?php echo $FighterSight;?> </li>
    </div>
    <div class="large-2 medium-1 small-1 cell">
    <li> Strength : <?php echo $FighterStrength;?> </li>
    </div>
    <div class="large-2 medium-1 small-1 cell">
    <li> Health : <?php echo $FighterHealth;?> </li>
    </div>
     <div class="large-2 medium-1 small-1 cell">
    <li> Current Health : <?php echo $FighterCurrentHealth;?> </li>
     </div>
     <div class="large-2 medium-1 small-1 cell">
    <li> Guild Id : <?php echo $FighterGuildId;?> </li>
     </div>
    </div>
</ul>
</div>
</div>
CREATE NEW FIGHTER : 
<?php  
echo $this->Form->create('Upload', array('type' => 'file'));
echo $this->Form->file('file');
echo $this->Form->submit('Upload');
//echo $this->Html->image("avatars/$FighterId.jpg?=filemtime($FighterId.jpg)", ['alt' => 'avatar']);

echo $this->Form->create();
echo $this->Form->control("Fighter Name",['name'=>'fighter_name']);
echo $this->Form->submit();
echo $this->Form->end();?>

NUMBER OF UPGRADES LEFT : <?php echo $upgradesLeft;?> <br>
Which upgrade do you choose ?
<?php 
echo $this->Form->create(null, ['url' => ['action' => 'upgrade']]);
echo $this->Form->radio('upgradeType',['+1 sight', '+1 strength', '+3 HP']);
echo $this->Form->submit();
echo $this->Form->end();?>