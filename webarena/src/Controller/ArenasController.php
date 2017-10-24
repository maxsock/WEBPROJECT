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
    $playerid = '2'; 
    $newfightername = 'Angmar';
    $depx = '0';
    $depy = '0';
    $NewFighterLevel = '3';
    $NewFighterXp ='10';
    $NewFighterHealth = '9';
    $NewFighterCurrentHealth = '9';
    $NewFighterStrength = '1' ;
    $NewFighterSight = '0';
    $NewFighterNextActionTime = NULL;
    $NewFighterGuildId = NULL;
    
    
    $this->loadModel('Fighters');
    $this->Fighters->setFighterCoordx($playerid,$depx); // update coord x
    $this->Fighters->setFighterCoordx($playerid,$depy); // update coord y
    $this->Fighters->setFighterName($playerid,$newfightername); // update name
    $this->Fighters->setFighterLevel($playerid,$NewFighterLevel); // update level
    $this->Fighters->setFighterXp($playerid,$NewFighterXp); // update xp
    $this->Fighters->setFighterSight($playerid,$NewFighterSight); // update sight    
    $this->Fighters->setFighterStrength($playerid,$NewFighterStrength); // update strength
    $this->Fighters->setFighterHealth($playerid,$NewFighterHealth); // change max health
    $this->Fighters->setFighterCurrentHealth($playerid,$NewFighterCurrentHealth); // update current health
    $this->Fighters->setFighterCurrentHealth($playerid,$NewFighterNextActionTime); // update next action time
    $this->Fighters->setFighterCurrentHealth($playerid,$NewFighterGuildId); // update guild id

    
    $this->set('FighterName',$this->Fighters->getFighterName($playerid));
    $this->set('FighterId',$this->Fighters->getFighterId($playerid));
    $this->set('FighterLevel',$this->Fighters->getFighterLevel($playerid));
    $this->set('FighterCoordX',$this->Fighters->getFighterCoordX($playerid));
    $this->set('FighterCoordY',$this->Fighters->getFighterCoordY($playerid));
    $this->set('FighterXp',$this->Fighters->getFighterXp($playerid));
    $this->set('FighterSight',$this->Fighters->getFighterSight($playerid));
    $this->set('FighterStrength',$this->Fighters->getFighterStrength($playerid));
    $this->set('FighterHealth',$this->Fighters->getFighterHealth($playerid));
    $this->set('FighterCurrentHealth',$this->Fighters->getFighterCurrentHealth($playerid));
    $this->set('FighterNextActionTime',$this->Fighters->getFighterNextActionTime($playerid));
    $this->set('FighterGuildId',$this->Fighters->getFighterGuildId($playerid));
   

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