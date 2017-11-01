<div class="grid-container background cell">
    <div class="grid-x align-center text-center cell">
<?php echo $this->Form->create(null, ['url' => ['action' => 'forgottenPassword']]);
echo $this->Form->control('Email');
echo $this->Form->submit('Get Password',['class' => 'radius button expand']);
echo $this->Form->end();?>

    </div>
</div>