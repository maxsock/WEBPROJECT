<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MessagesTable extends Table
{

  public function getLastMessage()
  {
      $query = $this->find('all')->order(["Messages.date"=>"DESC"])->first();
      return $query;
  }

  public function getLastMessageFromBoth($fighterIdUsed, $fighterId2)
  {
      // $query = $this->find('all')->where(["Messages.fighter_id" => $fighterIdUsed, "Messages.fighter_id_from" => $fighterId2])
      //   ->order(["Messages.date"=>"DESC"])->first();

        $query = $this->find('all',
        array('conditions' => array('Messages.fighter_id'=>$fighterIdUsed,
        'Messages.fighter_id_from'=>$fighterId2)))
          ->order(["Messages.date"=>"DESC"])->last();
      // $query = $this->find('all')->where(["Messages.fighter_id" => $fighterIdUsed, "Messages.fighter_id_from" => $fighterId2])
      //   ->order(["Messages.date"=>"DESC"])->first();
      //$lastMessageContent = $query->get("message");
      //return $lastMessageContent;
      return $query;
  }

  public function getAllMessagesFromBoth($fighterIdUsed, $fighterId2)
  {
    $arrayQr = $this->find('all')->where([
      'Messages.fighter_id'=>$fighterIdUsed,
      'Messages.fighter_id_from'=>$fighterId2
      ])->orWHere([
        'Messages.fighter_id'=>$fighterId2,
        'Messages.fighter_id_from'=>$fighterIdUsed
        ])
      ->order(["Messages.date"=>"DESC"]);
  return $arrayQr;
  }

}
