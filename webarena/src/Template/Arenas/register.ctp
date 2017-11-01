<?php echo $this->Form->create(null, ['url' => ['action' => 'register']]);
echo $this->Form->control('Email');
echo $this->Form->control('password', ['name' => 'Password']);
echo $this->Form->submit();
echo $this->Form->end();?>