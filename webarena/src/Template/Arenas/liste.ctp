<h4>
<?php
echo "MESSAGES WITH " . $toFighter['name'];
 ?>
</h4>

<table>
    <thead>
    <tr>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Title</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $val):; ?>
        <tr>
            <td><?= $val[ 'fighter_id_from' ]; ?></td>
            <td><?= $val['fighter_id']; ?></td>
            <td><?= $val['date']; ?></td>
            <td><?= $val['title']; ?></td>
            <td><?= $val['message']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br />
<h6>Send your message:</h6>
<?php
//use redirect

echo $this->Form->create('message', ['url' => ['action' => 'addMessage']]);
// We hide the following input (down here) form so that the user cannot modify it. This way the data is still sent to ArenasController.
echo $this->Form->control("To", ['type' => 'hidden', 'default' => $toFighter['id']]);
echo $this->Form->control("Title", ['type' => 'text']);
echo $this->Form->control("Message", ['type' => 'textarea']);
echo $this->Form->submit();
echo $this->Form->end();

 ?>
