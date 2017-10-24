Last message (in all) :
<br />
<?php echo "Date: " . $lastMessageDate ; ?>
<br />
<?php echo "Id from: ". $lastMessageIdFrom; ?>
<br />
<br />
<?php echo "Last messages from fighters 1 & 2: " . $lastMessageFromBoth; ?>
<br /><br /><br /><br />

<?php
echo 'The messages between f1 & f2 are: <ul>'. $allMessagesFromBoth;

// while ($allMessagesFromBoth->valid()) {
//     $article = $allMessagesFromBoth->current();
//     $allMessagesFromBoth->next();
// }

echo '</ul>';

echo $this->Form->create('message', ['url' => ['action' => 'addMessage']]);
echo $this->Form->control("To", ['type' => 'text']);
echo $this->Form->control("Title", ['type' => 'text']);
echo $this->Form->control("Message", ['type' => 'textarea']);
echo $this->Form->submit();
echo $this->Form->end();
?>
