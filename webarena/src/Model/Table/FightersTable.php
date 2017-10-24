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
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $name = $query->get("name");
      return($name);
  }
  public function getFighterId($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $id = $query->get("id");
      return($id);
  }
  public function getFighterLevel($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $level = $query->get("level");
      return($level);
  }
  public function getFighterCoordX($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $coordx = $query->get("coordinate_x");
      return($coordx);
  }
  public function getFighterCoordY($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $coordy = $query->get("coordinate_y");
      return($coordy);
  }
  public function getFighterXp($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $xp = $query->get("xp");
      return($xp);
  }
  public function getFighterSight($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $sight = $query->get("skill_sight");
      return($sight);
  }
  public function getFighterStrength($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $strength = $query->get("skill_strength");
      return($strength);
  }
  public function getFighterHealth($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $health = $query->get("skill_health");
      return($health);
  }
  public function getFighterCurrentHealth($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $currentHealth = $query->get("current_health");
      return($currentHealth);
  }
  public function getFighterNextActionTime($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $nextactiontime = $query->get("next_action_time");
      return($nextactiontime);
  }
  public function getFighterGuildId($playerid)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $guildId = $query->get("guild_id");
      return($guildId);
  }
  public function setFighterName($playerid,$newfightername)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->name=$newfightername;
      $this->save($query);
      
  }
  public function setFighterCoordx($playerid,$depx)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->coordinate_x=$query->coordinate_x+$depx;
      $this->save($query);
      
  }
  public function setFighterCoordy($playerid,$depy)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->coordinate_y=$query->coordinate_y+$depy;
      $this->save($query);
      
  }
  public function setFighterLevel($playerid,$NewFighterLevel)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->level=$NewFighterLevel;
      $this->save($query);
      
  }
  public function setFighterXp($playerid,$NewFighterXp)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->xp=$NewFighterXp;
      $this->save($query);
      
  }
  public function setFighterSight($playerid,$NewFighterSight)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->skill_sight=$NewFighterSight;
      $this->save($query);
      
  }
  public function setFighterStrength($playerid,$NewFighterStrength)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->skill_strength=$NewFighterStrength;
      $this->save($query);
      
  }
  public function setFighterHealth($playerid,$NewFighterCurrentHealth)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->skill_health=$NewFighterCurrentHealth;
      $this->save($query);
      
  }
  public function setFighterCurrentHealth($playerid,$NewFighterHealth)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->current_health=$NewFighterHealth;
      $this->save($query);
      
  }
  public function setFighterNextActionTime($playerid,$NewFighterNextActionTime)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->next_action_time=$NewFighterNextActionTime;
      $this->save($query);
      
  }
  public function setFighterGuildId($playerid,$NewFighterGuildId)
  {
      $query = $this->find('all')->where(["Fighters.id" => $playerid])->first();
      $query->guild_id=$NewFighterGuildId;
      $this->save($query);
      
  }
  
}