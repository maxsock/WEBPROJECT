<div class="grid-container background cell">
    <div id='hide-join'>
        <div class="grid-x margin-x align-center cell">
	<?php
	echo $this->Html->image("decor/joinguild.png", ['alt' => 'view','class' => 'image-size']); //Display form only if player is not in a guild (fighter->guild == null)?>
    </div>
	<?php echo $this->Form->create(null, ['url' => ['action' => 'joinGuild']]);
	echo $this->Form->input('guildsList', ['type'=>'select','options'=>($guildsName), 'empty'=>'Choose a guild to join']); 
	echo $this->Form->submit('Join this guild',['class' => 'radius button']);
	echo $this->Form->end();
	?>
</div>

<div id='hide-create'>
     <div class="grid-x margin-x align-center cell">
	<?php
	echo $this->Html->image("decor/createguild.png", ['alt' => 'view','class' => 'image-size']); //Display form only if player is not in a guild (fighter->guild == null)?>
     </div>
            <?php
	echo $this->Form->create(null, ['url' => ['action' => 'createGuild']]);
	echo $this->Form->control('guildName'); 
	echo $this->Form->submit('Create',['class' => 'radius button']);
	echo $this->Form->end();
	?>
</div>

<div id='hide-players'>
	Fighters in <?php echo ($guild) ?> guild
	<ul> 
	<?php //Display list only if player in a guild (fighter->guild != null)
		if ($guildPlayers != null)
		{
			foreach ($guildPlayers as $g)
			{?>
				<li><?php echo ($g->name) ?></li>
			<?php }
		} ?>
	</ul>
</div>

<div id='hide-quit'>
	<?php //Display form only if player in a guild (fighter->guild != null)
	echo $this->Form->create(null, ['url' => ['action' => 'quitGuild']]);
	echo $this->Form->submit('Quit guild',['class' => 'radius button']);
	echo $this->Form->end();
	?>
</div>

<script>

    $(function () 
    {
        <?php if($guild != null) 
        {?>
            $("#hide-create").hide();
            $("#hide-join").hide();
        <?php }
        else
        {?>
        	$("#hide-quit").hide();
            $("#hide-players").hide();
        <?php } ?>
    });

</script>

</div>