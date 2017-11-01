<div class="grid-container background cell">
    <div class="grid-x align-center text-center cell">
         <div class="large-4 small-8 cell">
<?php echo $this->Form->create(null, ['url' => ['action' => 'login']]);
echo $this->Form->control('Email');
echo $this->Form->control('password', ['name' => 'Password']);
echo $this->Form->submit('Login',['class' => 'radius button expand']);
echo $this->Form->end();?>
    </div>
    </div>
    <div class="grid-x align-center text-center">
  <div class="small-4 cell">
<?php echo $this->Html->link('Register', ['action' => 'register']); ?>
  </div>
    </div>
    <div class="grid-x align-center text-center">
  <div class="small-4 cell">
<?php echo $this->Html->link('Forgot your password?', ['action' => 'forgottenPassword']); ?>
  </div>
    </div>
</div>