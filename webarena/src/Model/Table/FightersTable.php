<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class FightersTable extends Table
{
  public function getFighter($id)
  {
    $query = $this->find('all')->where(["Fighters.id" => $id])->first();
    return($query);
  }
  public function getAllFighters(){
    $fightersTable = $this->find('all');
    return ($fightersTable);
  }
  public function update ($array)
  {

    $fightersTable = TableRegistry::get('fighters');
    $fighter = $fightersTable->get($array->id);

    $fighter = $array;
    $fightersTable->save($fighter);
  }
  public function actions($fig)
  {
    $fightersTable = TableRegistry::get('fighters');
    $fighter = $fightersTable->get($fig->id);
    $time = Time::now();
    $ftime = $fighter->next_action_time;

    if(Time::now()->subSeconds(10) > $ftime)
    {
      if(Time::now()->subSeconds(3*10) > $ftime)
      {
        $fighter->next_action_time = Time::now()->subSeconds(3*10);
      }
      $fighter->next_action_time= $fighter->next_action_time->addSeconds(10);
      $fightersTable->save($fighter);
    }
  }
  public function attack($dir,$fig)
  {
    $fightersTable = TableRegistry::get('fighters');
    $fighter = $fightersTable->get($fig->id);
    $fighterAttacked = $fightersTable->newEntity();

    $arrayName = array($fighterAttacked,0,0,0);

    if($dir=='UP'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x,$fighter->coordinate_y-1)->first();
    }
    if($dir=='DOWN'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x,$fighter->coordinate_y+1)->first();
    }
    if($dir=='LEFT'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x-1,$fighter->coordinate_y)->first();
    }
    if($dir=='RIGHT'){
      $fighterAttacked = $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x+1,$fighter->coordinate_y)->first();
    }

    if ($fighterAttacked != null)
    {
      $arrayName[0]=$fighterAttacked;
      if(rand(1,20)>10+$fighterAttacked->level-$fighter->level)
      {
        $arrayName[1]=1;
        $fighter->xp = $fighter->xp + 1;
        $bonus = 0;

        if($fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x,$fighter->coordinate_y-1)->first()->guild_id == $fighter->guild_id || 
          $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x,$fighter->coordinate_y+1)->first()->guild_id == $fighter->guild_id ||
          $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x-1,$fighter->coordinate_y)->first()->guild_id == $fighter->guild_id ||
          $fightersTable->findByCoordinate_xAndCoordinate_y($fighter->coordinate_x+1,$fighter->coordinate_y)->first()->guild_id == $fighter->guild_id)
        {
          $bonus = 1;
        }

        $arrayName[3] = $fighter->skill_strength + $bonus;
        $fighterAttacked->current_health = $fighterAttacked->current_health - ($fighter->skill_strength + $bonus);
        $fightersTable->save($fighterAttacked);

        if($fighterAttacked->current_health<=0)
        {
          $fighter->xp = $fighter->xp + $fighterAttacked->level -1;
          if($fighterAttacked->level >0)
          {
            $arrayName[1]=$fighterAttacked->level;
          }
          $arrayName[2]=1;
          $query = $fightersTable->delete($fighterAttacked);
        }
        $fightersTable->save($fighter);
      }
    }
    else
    {
      $arrayName[1]=-1;
    }
    return $arrayName;
  }
  public function move($dir, $fighter){
    $fightersTable = TableRegistry::get('Fighters');
    $allFighters = $this->find('all');
    $height = 10;
    $length = 15;
    $canMove=true;

    if($dir=='UP' && $fighter->coordinate_y>0)
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
    if($dir=='DOWN' && $fighter->coordinate_y<$height-1)
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
    if($dir=='LEFT' && $fighter->coordinate_x>0)
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

    if($dir=='RIGHT' && $fighter->coordinate_x<$length-1)
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
  public function newFighter($fighterInfo)
  {
    $fightersTable = TableRegistry::get('Fighters');
    $newFighter = $fightersTable->newEntity();
    
    $newFighter->name = $fighterInfo[0];
    $newFighter->id = $fighterInfo[1];
    $newFighter->player_id = $fighterInfo[2];
    $newFighter->level = '0';
    $newFighter->xp = '0';
    $newFighter->skill_sight = '2';
    $newFighter->skill_strength = '1';
    $newFighter->skill_health =  '5';
    $newFighter->current_health = '5';
    $newFighter->next_action_time = Time::now()->subSeconds(30);;
    $newFighter->guild_id = NULL;

    do
    {
      $newFighter->coordinate_x = rand ( '0' , '14' );
      $newFighter->coordinate_y = rand ( '0' , '9' );
    }while ($fightersTable->findByCoordinate_xAndCoordinate_y($newFighter->coordinate_x,$newFighter->coordinate_y)->first() != null);

    $fightersTable->save($newFighter);
    return $newFighter->id;
  }
  
  public function upgrade($fig, $choice)
  {
    $fightersTable = TableRegistry::get('Fighters');

    switch ($choice)
    {
      case 0:
        $fig->skill_sight = $fig->skill_sight+1;
        break;

      case 1:
        $fig->skill_strength = $fig->skill_strength+1;
        break;

      case 2:
        $fig->skill_health = $fig->skill_health+3;
        $fig->current_health = $fig->skill_health;
        break;
    }
    $fig->level = $fig->level+1;

    $fightersTable->save($fig);
  }


//functions used for message option
  public function getFightersNameAndId($id)
  {
    $query = $this->find('list', ['conditions' => ['fighters.id !=' => $id]], ['fields' => ['id', 'name']]);
    return ($query->toArray());
  }
  
  public function getFightersId(){
    $fightersId = $this->find('list', array(
        'fields' => array('Fighters.id')
    ));

    return $fightersId;
  }

  public function joinGuild($guildId, $fig)
  {
    $fightersTable = TableRegistry::get('Fighters');

    $fig->guild_id = $guildId[0];

    $fightersTable->save($fig);
  }

  public function quitGuild($fig)
  {
    $fightersTable = TableRegistry::get('Fighters');

    $fig->guild_id = null;

    $fightersTable->save($fig);
  }

  public function getFightersFromSameGuild($fig)
  {
    $query = $this->find('all', ['conditions' => ['fighters.id !=' => $fig->id, 'fighters.guild_id =' => $fig->guild_id]]);
    return $query;
  }
}
