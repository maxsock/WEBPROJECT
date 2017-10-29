
<div class="grid-container background cell">
 <div class="grid-x text-center ">
    <div class=" large-12 cell">
         <h2> <?php echo $FighterName;?> level <?php echo $FighterLevel;?> </h2>
    </div>
    </div>
<div class="grid-x margin-x">
  <div class="large-2 medium-2 small-2 cell">
<?php echo $this->Html->image("avatars/$FighterId.jpg?filemtime($avatar)", ['alt' => 'avatar','class'=>'th [radius]', 'data-open' => 'changeAvatar']); ?> 
   
    </div>
    

    <div class="reveal" id="changeAvatar" data-reveal>
   <?php 
echo $this->Html->image("avatars/$FighterId.jpg?filemtime($avatar)", ['alt' => 'avatar']); 
echo $this->Form->create('Upload', array('type' => 'file'));
echo $this->Form->file('file',['class' => 'radius button']);
echo $this->Form->submit('Upload',['class' => 'radius button']);
echo $this->Form->end();?>
      <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    
    
    
    <div class=" small-10 cell">
<dl>
   
 

 
   <div class="grid-x margin-x align-center">  
          <div class=" small-1 cell">
          <?php echo $this->Html->image("decor/xp.png");?>
          </div>
         <div class=" small-4 cell">
             <dt> Xp </dt>

            <dd> <?php echo $FighterXp;?> </dd>
        </div>
       <div class=" small-1 cell">
          <?php echo $this->Html->image("decor/health.png");?>
          </div>
         <div class=" small-2 cell">
             <dt> Health </dt>

            <dd> <?php echo $FighterHealth;?> </dd>
        </div>
    </div>

  
      <div class="grid-x margin-x align-center">  
          <div class=" small-1 cell text-center">
          <?php echo $this->Html->image("decor/def.png");?>
          </div>
         <div class=" small-4 cell">
             <dt> Sight </dt>

            <dd> <?php echo $FighterSight;?> </dd>
        </div>
          <div class=" small-1 cell text-center">
          <?php echo $this->Html->image("decor/health.png");?>
          </div>
         <div class=" small-2 cell">
             <dt> Current Health </dt>

            <dd> <?php echo $FighterCurrentHealth;?> </dd>
        </div>
    </div>
    
      <div class="grid-x margin-x align-center">  
          <div class=" small-1 cell text-center">
          <?php echo $this->Html->image("decor/strength.png");?>
          </div>
         <div class=" small-4 cell">
             <dt> Strength </dt>

            <dd> <?php echo $FighterStrength;?> </dd>
        </div>
          <div class=" small-1 cell text-center">
          <?php echo $this->Html->image("decor/guild.png");?>
          </div>
         <div class=" small-2 cell">
             <dt> Guild </dt>

            <dd> <?php echo $FighterGuildId;?> </dd>
        </div>
    </div>
    

        
      </div>
</dl>
    </div>
    
 <p><button class="radius button" data-open="addFighter">CREATE NEW FIGHTER</button></p>
<div class="reveal" id="addFighter" data-reveal>
<?php 
echo $this->Form->create();
echo $this->Form->control("Fighter Name",['name'=>'fighter_name']);
echo $this->Form->submit('add',array('name' => 'add'));
echo $this->Form->end();?>
<button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
 

 
 
NUMBER OF UPGRADES LEFT : <?php echo $upgradesLeft;?> <br>
Which upgrade do you choose ?
<?php 
echo $this->Form->create(null, ['url' => ['action' => 'upgrade']]);
echo $this->Form->radio('upgradeType',['+1 sight', '+1 strength', '+3 HP']);
echo $this->Form->submit();
echo $this->Form->end();?>

</div>