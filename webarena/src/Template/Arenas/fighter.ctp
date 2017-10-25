<dl>
    <dt> Id : </dt>
    <dd> <?php echo $FighterId;?> <dd>
    <dt> Name : </dt>
    <dd> <?php echo $FighterName;?> </dd>
    <dt> Level : </dt>
    <dd> <?php echo $FighterLevel;?> </dd>
    <dt> CoordX : </dt>
    <dd> <?php echo $FighterCoordX;?> </dd>
    <dt> CoordY : </dt>
    <dd> <?php echo $FighterCoordY;?> </dd>
    <dt> Xp : </dt 
    <dd> <?php echo $FighterXp;?> </dd>
    <dt> Sight : </dt>
    <dd> <?php echo $FighterSight;?> </dd>
    <dt> Strength : </dt>
    <dd> <?php echo $FighterStrength;?> </dd>
    <dt> Health :</dt>
    <dd> <?php echo $FighterHealth;?> </dd>
    <dt> Current Health : </dt>
    <dd> <?php echo $FighterCurrentHealth;?> </dd>
    <dt> Next Action Time : </dt>
    <dd> <?php echo $FighterNextActionTime;?> </dd>
    <dt> Guild Id : </dt>
    <dd> <?php echo $FighterGuildId;?> </dd>

</dl>
CREATE NEW FIGHTER : 
<?php echo $this->Form->create();
echo $this->Form->control("Fighter Name");
//echo $this->Form->control("");


echo $this->Form->submit();
echo $this->Form->end();?>