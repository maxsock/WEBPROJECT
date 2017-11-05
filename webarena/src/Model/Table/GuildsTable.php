<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class GuildsTable extends Table
{
	public function getGuildsName()
	{
		$names = $this->find('list',['fields' => ['id', 'name']])->toArray();
		return $names;
	}

	public function addGuild($name)
	{
		$guildsTable = TableRegistry::get('Guilds');
		$newGuild = $guildsTable->newEntity();

		if($guildsTable->findByName($name)->first() == null)
		{
			$newGuild->name = $name;
			$guildsTable->save($newGuild);
			pr($newGuild);
			return array($newGuild->id, $newGuild->name);
		}

		return null;
	}
}