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
$this->set('myname', "Maximilien Sock");
$this->loadModel('Fighters');
// $figterlist=$this->Fighters->find('all')->order(["Fighters.level"=>"DESC"])->first();
// pr($figterlist->toArray());
$this->set('test',$this->Fighters->getBestFighter());

}
public function login()
{
    
}
public function fighter()
{
    
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