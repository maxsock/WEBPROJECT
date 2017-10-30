
<div id="hide-dead-fighter" class="grid-container background cell">
    <div class="grid-x text-center ">
        <div class=" large-12 cell">
            <h2> <?php echo $FighterName;?> level <?php echo $FighterLevel;?> </h2>
        </div>
    </div>
    <div class="grid-x margin-x">
        <div class="large-2 medium-2 small-2 cell">
<?php echo $this->Html->image("avatars/$FighterId.jpg", ['alt' => 'avatar','class'=>'th [radius] avatar', 'data-open' => 'changeAvatar']); ?> 

        </div>


        <div class="reveal" id="changeAvatar" data-reveal>
   <?php 
echo $this->Html->image("avatars/$FighterId.jpg", ['alt' => 'avatar']); 
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

    <div id="hide-upgrades" >
        <div class="grid-x margin-x">   
            <h4> NUMBER OF UPGRADES LEFT : <?php echo $upgradesLeft;?> </h4>
        </div>
        <div class="grid-x margin-x">
            <h5> Which upgrade do you choose ? </h5>
        </div>
        <div class="grid-x margin-x">
<?php 
echo $this->Form->create(null, ['url' => ['action' => 'upgrade']]);
echo $this->Form->radio('upgradeType',['+1 sight', '+1 strength', '+3 HP']);
echo $this->Form->submit('Upgrade',['class' => 'radius button']);
echo $this->Form->end();?>
        </div>
    </div>
</div>

<div id="hide-button" class="grid-x margin-x">
    <div class="text-center cell">   
        <p><button class="radius button large" data-open="addFighter">CREATE NEW FIGHTER</button></p>
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
    </div>
</div>


<script>

    $(function () {
        if (<?php echo $FighterCurrentHealth;?> == '0')
        {
            $("#hide-dead-fighter").hide();
        } else
        {
            $("#hide-button").hide();
        }
        if (<?php echo $upgradesLeft;?> <= '0')
        {
            $("#hide-upgrades").hide();
        }

    });

</script>