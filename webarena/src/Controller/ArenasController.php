<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
  public function index()
  {
    $this->redirect(['action' => 'login']);
  }

  public function login()
  {
    $this->loadModel('Players');
    if ($this->request->is('post')) 
    {
      if (!is_null($this->request->getData()['Email']) and !is_null($this->request->getData()['Password']))
      {
        $user = $this->Players->login($this->request->getData());
        if (is_null($user)) 
        {
          $this->Flash->error("Try to enter your credentials again");
        } 
        else 
        {
          $this->loadModel('Fighters');
          $fighter = $this->Fighters->find()->select()->Where(['Fighters.player_id' => $user['id']])->first();
          if($fighter == null)
          {
            $id = null;
          }
          else
          {
            $id = $fighter->id;
          }

          $this->request->session()->write('User', $user);
          $this->request->session()->write('fid', $id);
          $this->redirect(['action' => 'fighter']);
        }
      }
      else
      {
        $this->Flash->error("Fill both email and password fields to register");
        $this->redirect(['action' => 'login']);
      }
    }         
  }

  public function register()
  {
    $this->loadModel('Players');
    if ($this->request->is('post')) 
    {
      if (!is_null($this->request->getData()['Email']) and !is_null($this->request->getData()['Password']))
      {
        $user = $this->Players->register($this->request->getData());
        if (is_null($user)) 
        {
          $this->Flash->error("Try with an unused email");
          $this->redirect(['action' => 'login']);
        } 
        else 
        {
          $this->loadModel('Fighters');
          $fighter = $this->Fighters->find()->select()->Where(['Fighters.player_id' => $user['id']])->first();
          if($fighter == null)
          {
            $id = null;
          }
          else
          {
            $id = $fighter->id;
          }

          $this->request->session()->write('User', $user);
          $this->request->session()->write('fid', $id);
          $this->redirect(['action' => 'fighter']);
        }
      }
      else
      {
        $this->Flash->error("Fill both email and password fields to register");
        $this->redirect(['action' => 'login']);
      }
    }
  }

  public function forgottenPassword()
  {
    $this->loadModel('Players');
    if ($this->request->is('post')) 
    {
      if (!is_null($this->request->getData()['Email']))
      {
        $user = $this->Players->find()->select()->Where(['email' => $this->request->getData()['Email']])->first();
        if (is_null($user)) 
        {
          $this->Flash->error("Try with a valid email");
          $this->redirect(['action' => 'forgottenPassword']);
        } 
        else 
        {
          $this->Flash->success("Your new password : ".$this->Players->generatePassword($user));
          $this->redirect(['action' => 'login']);
        }
      }
      else
      {
        $this->Flash->error("Fill the email field to get a new password");
        $this->redirect(['action' => 'forgottenPassword']);
      }
    }
  }

  public function logout()
  {
    $this->request->session()->destroy();
    $this->redirect(['action' => 'login']);
  }

  public function fighter()
  {
    $user = $this->request->session()->read('User');
    if (!isset($user)) 
    {
      $this->redirect(['action' => 'login']);
    }

    $id = $this->request->session()->read('fid');
    $this->loadModel('Fighters');

    $array=$this->Fighters->getFighter($id);
    $this->set('avatar','image/jpeg');

    if($array == null)
    {
        $array=$this->Fighters->getFighter($id);
    
        $file2 = new File(WWW_ROOT . "img/avatars/noimage.jpg", false, 0777);
        $file2->copy(WWW_ROOT . "img/avatars/$id.jpg");

      
         if(isset($this->request->data['add']))
        {
          $array2 = array($this->request->data['fighter_name'], $id, $this->request->session()->read('User.id'));
          $this->request->session()->write('fid',$this->Fighters->newFighter($array2));
          $id = $this->request->session()->read('fid');
        }
    }

    if (!empty($this->request->data['file']))
    {
      $avatar = $this->request->data['file'];
      if ($avatar['type'] == 'image/png' or $avatar['type'] == 'image/jpeg' or $avatar['type'] == 'image/gif')
      {
        move_uploaded_file($avatar['tmp_name'], WWW_ROOT . 'img/avatars/' . "$id.jpg");
        $this->set('avatar',$avatar['type']);
      }
    }

    if($this->Fighters->getFighter($id) != null)
    {
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
    else
    {
      $this->set('avatar','image/jpeg');
      $this->set('FighterName','');
      $this->set('FighterId','');
      $this->set('FighterLevel','');
      $this->set('FighterCoordX','');
      $this->set('FighterCoordY','');
      $this->set('FighterXp','');
      $this->set('FighterSight','');
      $this->set('FighterStrength','');
      $this->set('FighterHealth','');
      $this->set('FighterCurrentHealth',0);
      $this->set('FighterNextActionTime','');
      $this->set('FighterGuildId','');
      $this->set('upgradesLeft', 0);
    }
  }

  public function sight()
  {
    $user = $this->request->session()->read('User');
    if (!isset($user)) 
    {
      $this->redirect(['action' => 'login']);
    }

    $id = $this->request->session()->read('fid');
    $height = 10;
    $length = 15;

    $this->loadModel('Fighters');
    $this->loadModel('Events');
    $this->set('h', $height);
    $this->set('l', $length);

    $actionsLeft = floor(date_diff(Time::now(), $this->Fighters->getFighter($id)->next_action_time)->s /10);
    if($actionsLeft > 3)
    {
      $actionsLeft = 3;
    }

    if($this->request->is('post'))
    {
      $fighter=$this->Fighters->getFighter($id);
      if ($actionsLeft > 0)
      {
        $this->Fighters->actions($fighter);
        $actionsLeft = $actionsLeft-1;
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
    }

    $this->set('FighterCoordX',$this->Fighters->getFighter($id)->coordinate_x);
    $this->set('FighterCoordY',$this->Fighters->getFighter($id)->coordinate_y);
    $this->set('FighterSkillSight',$this->Fighters->getFighter($id)->skill_sight);
    $this->set('FighterId',$this->Fighters->getFighter($id)->id);
    $this->set('FighterCurrentHealth',$this->Fighters->getFighter($id)->current_health);
    $this->set('avatar','image/jpeg');
    $this->set('actionsLeft',$actionsLeft);

    $this->set('fightersTable', $this->Fighters->getAllFighters());
  }

  public function addMessage()
  {
    $id = $this->request->session()->read('fid');
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
    $id = $this->request->session()->read('fid');
    $this->loadModel('Messages');
    $this->loadModel('Fighters');

    $sendToId = $this->request->data['prix'];

    $this->set('toFighter', $this->Fighters->getFighter($sendToId));
    $this->set('produits', $this->Messages->getAllMessagesFromBoth($id, $sendToId));
  }

  public function diary()
  {
    $user = $this->request->session()->read('User');
    if (!isset($user)) 
    {
      $this->redirect(['action' => 'login']);
    }

    $id = $this->request->session()->read('fid');

    $this->loadModel('Events');
    $this->loadModel('Fighters');

    $fig = $this->Fighters->getFighter($id);
    $this->set('eventsTable', $this->Events->diary($fig));
  }

  public function messages()
  {
    $user = $this->request->session()->read('User');
    if (!isset($user)) 
    {
      $this->redirect(['action' => 'login']);
    }
    
    $id = $this->request->session()->read('fid');
    $this->loadModel('Fighters');
    $this->set('fightersTable', $this->Fighters->getAllFighters());
    $this->set('fightersNameAndId', $this->Fighters->getFightersNameAndId($id));

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
    $id = $this->request->session()->read('fid');
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