<div class="grid-container background cell">
    <div class="grid-x align-center text-center cell">
        <div class="large-4 small-8 cell">
<?php echo $this->Form->create(null, ['url' => ['action' => 'register']]);
echo $this->Form->control('Email');
echo $this->Form->control('password', ['name' => 'Password']);
echo $this->Form->submit('Register',['class' => 'radius button expand']);
echo $this->Form->end();?>
</div>
    </div>
</div>