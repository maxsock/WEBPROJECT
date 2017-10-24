<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\I18n\Time;
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
  $id=2;
  $height = 10;
  $length = 15;

  $this->loadModel('Fighters');
  $this->set('h', $height);
  $this->set('l', $length);

  if($this->request->is('post')){

    $fighter=$this->Fighters->getFighter($id);

    if($this->request->data['dir']=='GO UP' && $fighter->coordinate_y>0){

      $fighter->coordinate_y=$fighter->coordinate_y-1;
      $this->Fighters->save($fighter);
    }
    if($this->request->data['dir']=='GO DOWN' && $fighter->coordinate_y<9){

      $fighter->coordinate_y=$fighter->coordinate_y+1;
      $this->Fighters->save($fighter);
    }
    if($this->request->data['dir']=='GO LEFT' && $fighter->coordinate_x>0){

      $fighter->coordinate_x=$fighter->coordinate_x-1;
      $this->Fighters->save($fighter);
    }
    if($this->request->data['dir']=='GO RIGHT' && $fighter->coordinate_x<14){

      $fighter->coordinate_x=$fighter->coordinate_x+1;
      $this->Fighters->save($fighter);
    }

}

$this->set('FighterCoordX',$this->Fighters->getFighter($id)->coordinate_x);
$this->set('FighterCoordY',$this->Fighters->getFighter($id)->coordinate_y);



}

public function addMessage()
{
    if ($this->request->is('post'))
    {
        $id_from = 1;
        $this->loadModel('Fighters');
        $userTo = $this->Fighters->findByName($this->request->getData()['To'])->first()->id;

        $array = array(Time::now(), $this->request->getData()['Title'], $this->request->getData()['Message'], $id_from, $userTo);

        $this->loadModel('Messages');
        $this->Messages->addMessage($array);
        return $this->redirect(['action' => 'messages']);
    }
}

public function diary()
{

}

public function messages(){
  $this->loadModel('Messages');
  $this->set('lastMessageIdFrom', $this->Messages->getLastMessage()->message);
  $this->set('lastMessageDate', $this->Messages->getLastMessage()->date);

  $this->set('lastMessageFromBoth', $this->Messages->getLastMessageFromBoth(1, 2));

  $this->set('allMessagesFromBoth', $this->Messages->getAllMessagesFromBoth(1, 3));
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
