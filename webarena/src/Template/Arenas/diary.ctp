<table>
	<tr>
		<th>Date</th>
	    <th>Event</th>
	    <th>Coordinate X</th> 
	    <th>Coordinate Y</th>
	 </tr>

	<?php
	foreach ($eventsTable as $e)
	{?>
		<tr>
			<th><?php echo ($e->date) ?></th>
			<th><?php echo ($e->name) ?></th>
			<th><?php echo ($e->coordinate_x) ?></th>
			<th><?php echo ($e->coordinate_y) ?></th>
		</tr>
	<?php } ?>
</table>