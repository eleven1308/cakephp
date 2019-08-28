<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; //include this line
use Cake\ORM\Entity;
use Cake\Utility\Security;
use Cake\Core\Configure;
use Hashids\Hashids;

class User extends Entity
{

    /**
     *  User Password Hash
     */
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
