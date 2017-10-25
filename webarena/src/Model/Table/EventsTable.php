<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class EventsTable extends Table
{
	public function add($newTuple)
	{
		$eventsTable = TableRegistry::get('Events');
		$newEvent = $eventsTable->newEntity();

		$newEvent->name = $newTuple[0];
		$newEvent->date = $newTuple[1];
		$newEvent->coordinate_x = $newTuple[2];
		$newEvent->coordinate_y = $newTuple[3];

		$eventsTable->save($newEvent);
	}
}