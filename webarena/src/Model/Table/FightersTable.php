<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class FightersTable extends Table
{
 public function add($newTuple)
  {
    $fightersTable = TableRegistry::get('Fighters');
    $newFighter = $fightersTable->newEntity();

    $newFighter->name = $newTuple[0];
    $newFighter->player_id = $newTuple[1];
    $newFighter->coordinate_x = $newTuple[2];
    $newFighter->coordinate_y = $newTuple[3];
    $newFighter->level = $newTuple[4];
    $newFighter->xp = $newTuple[5];
    $newFighter->skill_sight = $newTuple[6];
    $newFighter->skill_strength = $newTuple[7];
    $newFighter->skill_health = $newTuple[8];
    $newFighter->current_health = $newTuple[9];
    $newFighter->next_action_time = $newTuple[10];
    $newFighter->guild_id = $newTuple[11];

    $fightersTable->save($newFighter);
  }
 
  public function getFighter($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      return($query);
  }
 
 
  public function setFighterGuildId($playerid,$NewFighterGuildId)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->guild_id=$NewFighterGuildId;
      $this->save($query);
      
  }
  public function update ($array)
  { 
    $fightersTable = TableRegistry::get('fighters');
    $fighter = $fightersTable->get($array[0]); 

    $fighter->name = $array[1];
    $fightersTable->save($fighter);
  }
}