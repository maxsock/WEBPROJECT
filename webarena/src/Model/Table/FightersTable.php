<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table
{
 
  public function getBestFighter()
  {
      return($this->find('all')->order(["Fighters.level"=>"DESC"])->first());
  }
  public function getFighterName($playerid)
  {
      $query = $this->find('list')->where(["Fighters.id" => $playerid])->first();
      return($query);
  }
}