<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class Customer_GroupTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('customer_group');

    }
}
