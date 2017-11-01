<?php echo $this->Form->create(null, ['url' => ['action' => 'login']]);
echo $this->Form->control('Email');
echo $this->Form->control('password', ['name' => 'Password']);
echo $this->Form->submit();
echo $this->Form->end();?>

<?php echo $this->Html->link('Register', ['action' => 'register']); ?>
<?php echo $this->Html->link('Forgot your password?', ['action' => 'forgottenPassword']); ?>