<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class FightersTable extends Table{

  public function add($newTuple) {
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
  public function getFighter($id){
    $query = $this->find('all')->where(["Fighters.id" => $id])->first();
    return($query);
  }
  public function getAllFighters(){
    $fightersTable = $this->find('all');
    return ($fightersTable);
  }
  public function update ($array){

    $fightersTable = TableRegistry::get('fighters');
    $fighter = $fightersTable->get($array->id);

    $fighter = $array;
    $fightersTable->save($fighter);
  }
  public function attack($dir,$fig){

    $fightersTable = TableRegistry::get('fighters');
    $fighter = $fightersTable->get($fig->id);
    $fighterAttacked = $fightersTable->newEntity();

    $arrayName = array('',0,0);

    if($dir=='GO UP'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x,$fighter->coordinate_y-1)->first();
    }
    if($dir=='GO DOWN'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x,$fighter->coordinate_y+1)->first();
    }
    if($dir=='GO LEFT'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x-1,$fighter->coordinate_y)->first();
    }
    if($dir=='GO RIGHT'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x+1,$fighter->coordinate_y)->first();
    }

    if ($fighterAttacked != null)
    {
      $arrayName[0]=$fighterAttacked->name;
      $arrayName[1]=1;
      $fighterAttacked->current_health = $fighterAttacked->current_health - $fighter->skill_strength;
      $fightersTable->save($fighterAttacked);

      if($fighterAttacked->current_health<=0)
      {
        $exp=$fighterAttacked->level;
        $arrayName[1]=$exp;
        $arrayName[2]=1;
        $query = $fightersTable->delete($fighterAttacked);
      }

    }
    return $arrayName;

  }
  public function move($dir, $fighter){
    $fightersTable = TableRegistry::get('Fighters');
    $allFighters = $this->find('all');
    $height = 10;
    $length = 15;
    $canMove=true;

    if($dir=='GO UP' && $fighter->coordinate_y>0)
    {
      foreach ($allFighters as $f) {
        if($f->coordinate_x == $fighter->coordinate_x && $f->coordinate_y == $fighter->coordinate_y-1){
          $canMove=false;
        }
      }
      if($canMove==true){
        $fighter->coordinate_y = $fighter->coordinate_y -1;
        $fightersTable->save($fighter);
      }
    }
    if($dir=='GO DOWN' && $fighter->coordinate_y<$height-1)
    {
      foreach ($allFighters as $f) {
        if($f->coordinate_x == $fighter->coordinate_x && $f->coordinate_y == $fighter->coordinate_y+1){
          $canMove=false;
        }
      }
      if($canMove==true){
        $fighter->coordinate_y = $fighter->coordinate_y+1;
        $fightersTable->save($fighter);
      }

    }
    if($dir=='GO LEFT' && $fighter->coordinate_x>0)
    {
      foreach ($allFighters as $f) {
        if($f->coordinate_x == $fighter->coordinate_x-1 && $f->coordinate_y == $fighter->coordinate_y){
          $canMove=false;
        }
      }
      if($canMove==true){
        $fighter->coordinate_x = $fighter->coordinate_x-1;
        $fightersTable->save($fighter);
      }
    }

    if($dir=='GO RIGHT' && $fighter->coordinate_x<$length-1)
    {
      foreach ($allFighters as $f) {
        if($f->coordinate_x == $fighter->coordinate_x+1 && $f->coordinate_y == $fighter->coordinate_y){
          $canMove=false;
        }
      }
      if($canMove==true){
        $fighter->coordinate_x = $fighter->coordinate_x+1;
        $fightersTable->save($fighter);
      }

    }
  }

}
