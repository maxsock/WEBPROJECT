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

	public function addAttackEvent($newTuple)
	{
		$eventsTable = TableRegistry::get('Events');
		$newEvent = $eventsTable->newEntity();

		if($newTuple[1] > 0) //He suceeded his attack
		{
			if($newTuple[2] == 1) //He killed his opponent
			{
				$newEvent->name = $newTuple[3]->name.' killed '.$newTuple[0]->name.' by dealing '.$newTuple[3]->skill_strength.' of damage';
			}
			else
			{
				$newEvent->name = $newTuple[3]->name.' dealt '.$newTuple[3]->skill_strength.' of damage to '.$newTuple[0]->name;
			}
		}
		if ($newTuple[1] == 0) 
		{
			$newEvent->name = $newTuple[3]->name.' failed his attack on '.$newTuple[0]->name;
		}
		if ($newTuple[1] < 0) 
		{
			$newEvent->name = $newTuple[3]->name.' attacked but was not aiming at an opponent';
		}

		$newEvent->date = $newTuple[4];
		$newEvent->coordinate_x = $newTuple[3]->coordinate_x;
		$newEvent->coordinate_y = $newTuple[3]->coordinate_y;

		$eventsTable->save($newEvent);
	}

	public function addMoveEvent($newTuple)
	{
		$eventsTable = TableRegistry::get('Events');
		$newEvent = $eventsTable->newEntity();
		$dir = '';

		switch ($newTuple[1]) 
		{
			case 'UP':
				$dir = 'up';
				break;
			case 'DOWN':
				$dir = 'down';
				break;
			case 'LEFT':
				$dir = 'left';
				break;
			case 'RIGHT':
				$dir = 'right';
				break;
		}

		$newEvent->name = $newTuple[0]->name.' went '.$dir;
		$newEvent->date = $newTuple[2];
		$newEvent->coordinate_x = $newTuple[0]->coordinate_x;
		$newEvent->coordinate_y = $newTuple[0]->coordinate_y;

		$eventsTable->save($newEvent);
	}
}