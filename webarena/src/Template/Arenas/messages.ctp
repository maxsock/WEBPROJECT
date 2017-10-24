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
//echo 'The messages between f1 & f2 are: <ul>'. $allMessagesFromBoth;

foreach( $allMessagesFromBoth as $val ) {
    echo '<li>';
    echo "from : " . $val[ 'fighter_id_from' ] . " - to: " . $val['fighter_id'] . " - date: " . $val['date'] . " - message: " . $val['message'];
    echo '</li>';
}

echo '</ul>';
?>
