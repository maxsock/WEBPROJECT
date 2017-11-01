<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\Validation\Validator;

class PlayersTable extends Table
{
    public function login($data)
    {
        $email = $data['Email'];
        $password = $data['Password'];
        $playersTable = TableRegistry::get('Players');

        $user = $playersTable->findByEmail($email)->first();

        if (!is_null($user)) 
        {
            if(password_verify($password, $user->password))
            {
                return $user;
            }
            else
            {
                return null;
            }
        } 
        else 
        {
            return null;
        }
    }

    public function register($newPlayer)
    {
        $email = $newPlayer['Email'];
        $password = $newPlayer['Password'];
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        $playersTable = TableRegistry::get('Players');

        $existingEmail = $playersTable->findByEmail($email)->first();

        if (is_null($existingEmail)) 
        {
            $user = $playersTable->newEntity();
            $user->email = $email;
            $user->password = $hashedPass;
            if ($playersTable->save($user)) 
            {
                return $user;
            }
        }
        return null;
    }

    function generatePassword($user) 
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $password = ''; $i < 8; $i++) 
        {
            $index = rand(0, $count - 1);
            $password .= mb_substr($chars, $index, 1);
        }

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        $playersTable = TableRegistry::get('Players');

        $user->password = $hashedPass;

        if ($playersTable->save($user)) 
        {
            return $password;
        }
    }
}