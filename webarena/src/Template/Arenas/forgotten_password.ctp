<?php echo $this->Form->create(null, ['url' => ['action' => 'forgottenPassword']]);
echo $this->Form->control('Email');
echo $this->Form->submit();
echo $this->Form->end();?>