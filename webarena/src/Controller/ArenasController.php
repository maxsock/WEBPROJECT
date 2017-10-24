<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{
// $figterlist=$this->Fighters->find('all')->order(["Fighters.level"=>"DESC"])->first();
// pr($figterlist->toArray());
//$this->set('myname', "Maximilien Sock");
}
public function login()
{
    
}
public function fighter()
{
    $id = '2'; 
    
    $this->loadModel('Fighters');
    $array=$this->Fighters->getFighter($id);
    $array->name = 'Angmar2';
    $this->Fighters->update($array); 
    
    
    $this->set('FighterName',$this->Fighters->getFighter($id)->name);
    $this->set('FighterId',$this->Fighters->getFighter($id)->id);
    $this->set('FighterLevel',$this->Fighters->getFighter($id)->level);
    $this->set('FighterCoordX',$this->Fighters->getFighter($id)->coordinate_x);
    $this->set('FighterCoordY',$this->Fighters->getFighter($id)->coordinate_y);
    $this->set('FighterXp',$this->Fighters->getFighter($id)->xp);
    $this->set('FighterSight',$this->Fighters->getFighter($id)->skill_sight);
    $this->set('FighterStrength',$this->Fighters->getFighter($id)->skill_strength);
    $this->set('FighterHealth',$this->Fighters->getFighter($id)->skill_health);
    $this->set('FighterCurrentHealth',$this->Fighters->getFighter($id)->current_health);
    $this->set('FighterNextActionTime',$this->Fighters->getFighter($id)->next_action_time);
    $this->set('FighterGuildId',$this->Fighters->getFighter($id)->guild_id);
   

}
public function sight()
{
    
}
public function diary()
{
    
}
}

function profile()
{
    $this->loadModel("Player");
     if($this->request->is("post"))
        {
        $this->request->getData("email");
        }
    $player=$this->get(42);
    $this->set("player",$player);
   
        
}