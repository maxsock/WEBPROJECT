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


    $array=array('2','Angmar');

    $this->loadModel('Fighters');
    $this->Fighters->update($array);


    $this->set('FighterName',$this->Fighters->getFighter($playerid)->name);
    $this->set('FighterId',$this->Fighters->getFighter($playerid)->id);
    $this->set('FighterLevel',$this->Fighters->getFighter($playerid)->level);
    $this->set('FighterCoordX',$this->Fighters->getFighter($playerid)->coordinate_x);
    $this->set('FighterCoordY',$this->Fighters->getFighter($playerid)->coordinate_y);
    $this->set('FighterXp',$this->Fighters->getFighter($playerid)->xp);
    $this->set('FighterSight',$this->Fighters->getFighter($playerid)->skill_sight);
    $this->set('FighterStrength',$this->Fighters->getFighter($playerid)->skill_strength);
    $this->set('FighterHealth',$this->Fighters->getFighter($playerid)->skill_health);
    $this->set('FighterCurrentHealth',$this->Fighters->getFighter($playerid)->current_health);
    $this->set('FighterNextActionTime',$this->Fighters->getFighter($playerid)->next_action_time);
    $this->set('FighterGuildId',$this->Fighters->getFighter($playerid)->guild_id);


}
public function sight()
{

}
public function diary()
{

}

public function messages(){
  $this->loadModel('Messages');
  $this->set('lastMessageIdFrom', $this->Messages->getLastMessage()->message);
  $this->set('lastMessageDate', $this->Messages->getLastMessage()->date);

  $this->set('lastMessageFromBoth', $this->Messages->getLastMessageFromBoth(1, 2));

  $this->set('allMessagesFromBoth', $this->Messages->getAllMessagesFromBoth(1, 2));
  // $this->set('messagesFromBoth', $this->Messages->getAllMessagesFromBoth(1, 2)->message);



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
