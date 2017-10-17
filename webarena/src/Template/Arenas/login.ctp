<?php echo $this->Form->create();
echo $this->Form->control("Pseudo");
echo $this->Form->input('Password', array('type' => 'password'));


echo $this->Form->submit();
echo $this->Form->end();?>