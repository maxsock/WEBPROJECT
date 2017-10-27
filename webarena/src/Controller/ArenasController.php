<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Utility\Hash;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
  var $fighterId = 2;

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
    $id = $this->fighterId;
    $this->loadModel('Fighters');

    $array=$this->Fighters->getFighter($id);


    if($array->current_health == '0')
    {
      $entity = $this->Fighters->get($id);
      $result = $this->Fighters->delete($entity);

      if($this->request->is('post'))
      {
        $array->id=$id;
        $array->name= $this->request->data['fighter_name'];
        $this->Fighters->newFighter($array);
      }
    }

    if (!empty($this->request->data['file']))
    {
      $avatar = $this->request->data['file'];
      $this->set('avatar',$avatar['type']);
      if ($avatar['type'] == 'image/png' or $avatar['type'] == 'image/jpeg' or $avatar['type'] == 'image/gif')
      {
        move_uploaded_file($avatar['tmp_name'], WWW_ROOT . 'img/avatars/' . "$id.jpg");
      }
    }

    $this->set('avatar','image/png');
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

    $upgradesLeft = floor((($this->Fighters->getFighter($id)->xp)/4) - $this->Fighters->getFighter($id)->level);
    $this->set('upgradesLeft', $upgradesLeft);
  }

  public function sight()
  {
    $id = $this->fighterId;
    $height = 10;
    $length = 15;

    $this->loadModel('Fighters');
    $this->loadModel('Events');
    $this->set('h', $height);
    $this->set('l', $length);

    if($this->request->is('post'))
    {
      $fighter=$this->Fighters->getFighter($id);

      if($this->request->data['attack'])
      {
        $this->Events->addAttackEvent(array_merge($this->Fighters->attack($this->request->data['dir'], $fighter),array($fighter,Time::now())));
      }
      else
      {
        $this->Fighters->move($this->request->data['dir'], $fighter);
        $this->Events->addMoveEvent(array($fighter,$this->request->data['dir'],Time::now()));
      }
    }

    $this->set('FighterCoordX',$this->Fighters->getFighter($id)->coordinate_x);
    $this->set('FighterCoordY',$this->Fighters->getFighter($id)->coordinate_y);
    $this->set('FighterSkillSight',$this->Fighters->getFighter($id)->skill_sight);
    $this->set('FighterId',$this->Fighters->getFighter($id)->id);
    $this->set('avatar','image/png');

    $this->set('fightersTable', $this->Fighters->getAllFighters());
  }

  public function addMessage()
  {
    $id = $this->fighterId;
      if ($this->request->is('post'))
      {
          $userTo = $this->request->getData()['To'];
          $array = array(Time::now(), $this->request->getData()['Title'], $this->request->getData()['Message'], $id, $userTo);

          $this->loadModel('Messages');
          $res = $this->Messages->addMessage($array);

          if($res != null)
          {
            return $this->redirect(['controller' => 'arenas', 'action' => 'messages']);
          }
          else
          {

          }
      }
  }

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Flash');
    $this->loadComponent('RequestHandler');
  }

  public function liste()
  {
    $id = $this->fighterId;
    $this->loadModel('Messages');
    $this->loadModel('Fighters');

    $sendToId = $this->request->data['prix'];

    $this->set('toFighter', $this->Fighters->getFighter($sendToId));
    $this->set('produits', $this->Messages->getAllMessagesFromBoth($id, $sendToId));
  }

  public function diary()
  {

  }

  public function messages()
  {
    $this->loadModel('Fighters');
    $this->set('fightersTable', $this->Fighters->getAllFighters());
    $this->set('fightersNameAndId', $this->Fighters->getFightersNameAndId());

    $this->loadModel('Messages');

    if ($this->Messages->getLastMessage() != null) 
    {
      $this->set('lastMessageIdFrom', $this->Messages->getLastMessage()->message);
      $this->set('lastMessageDate', $this->Messages->getLastMessage()->date);
    }
    else
    {
      $this->set('lastMessageIdFrom', ' ');
      $this->set('lastMessageDate', ' ');
    }

    /*$this->set('lastMessageFromBoth', $this->Messages->getLastMessageFromBoth(1, 2));
    $this->set('allMessagesFromBoth', $this->Messages->getAllMessagesFromBoth(1, 2));*/
  }

  public function upgrade()
  {
    $id = $this->fighterId;
    $this->loadModel('Fighters');
    $fig = $this->Fighters->getFighter($id);

    $upgradesLeft = floor((($fig->xp)/4) - $fig->level);
    echo ($fig->xp/4);
    echo ($fig->level);
    echo ($upgradesLeft);

    if ($this->request->is('post'))
    {
      if($upgradesLeft > 0)
      {
        $this->Fighters->upgrade($fig,$this->request->getData()['upgradeType']);
      }
    }
    $this->set('upgradesLeft', $upgradesLeft);
    $this->redirect(['action'=>'fighter']);
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
