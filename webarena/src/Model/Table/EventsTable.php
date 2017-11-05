<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class EventsTable extends Table
{
	public function addAttackEvent($newTuple)
	{
		$eventsTable = TableRegistry::get('Events');
		$newEvent = $eventsTable->newEntity(); //Create a new Fighter entity

		if($newTuple[1] > 0) //He suceeded his attack
		{
			if($newTuple[2] == 1) //He killed his opponent
			{
				$newEvent->name = $newTuple[4]->name.' killed '.$newTuple[0]->name.' by dealing '.$newTuple[3].' of damage'; //Set the event name as "Player1 killed Player2 by dealing x of damage"
			}
			else
			{
				$newEvent->name = $newTuple[4]->name.' dealt '.$newTuple[3].' of damage to '.$newTuple[0]->name; //Set the event name as "Player1 dealt x of damage to Player2"
			}
		}
		if ($newTuple[1] == 0) //He failed his attack
		{
			$newEvent->name = $newTuple[4]->name.' failed his attack on '.$newTuple[0]->name; //Set the event name as "Player1 failed his attack on Player2"
		}
		if ($newTuple[1] < 0) //The case he was aiming for does not contain an opponent
		{
			$newEvent->name = $newTuple[4]->name.' attacked but was not aiming at an opponent'; //Set the event name as "Player1 was not aiming at an opponent"
		}

		$newEvent->date = $newTuple[5]; //Set the event date
		$newEvent->coordinate_x = $newTuple[4]->coordinate_x; //Set the event x coordinate 
		$newEvent->coordinate_y = $newTuple[4]->coordinate_y; //Set the event y coordinate 

		$eventsTable->save($newEvent); //Add a new event in the events table
	}

	public function addMoveEvent($newTuple)
	{
		$eventsTable = TableRegistry::get('Events');
		$newEvent = $eventsTable->newEntity(); //Create a new Event entity
		$dir = '';

		switch ($newTuple[1]) //switch on the direction and set the variable $dir
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

		$newEvent->name = $newTuple[0]->name.' went '.$dir; //Set the event name as "Player1 went $dir"
		$newEvent->date = $newTuple[2]; //Set the event date
		$newEvent->coordinate_x = $newTuple[0]->coordinate_x; //Set the event x coordinate 
		$newEvent->coordinate_y = $newTuple[0]->coordinate_y; //Set the event y coordinate

		$eventsTable->save($newEvent); //Add a new event in the events table
	}

	public function diary($fig)
	{
		$eventsTable = TableRegistry::get('Events')->find();
		$fileteredEvents = array();

		foreach ($eventsTable as $e) 
		{
			if($e->date->wasWithinLast('1 day'))
			{
				if((abs($e->coordinate_x-$fig->coordinate_x)+abs($e->coordinate_y-$fig->coordinate_y)) <= $fig->skill_sight)
				{
					array_push($fileteredEvents, $e);
				}
			}
		}
		arsort($fileteredEvents);
		return $fileteredEvents;
	}
}