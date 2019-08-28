<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CustomersTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('customers');
        $this->addBehavior('Timestamp');

    }

    public function validationCreate_customer(Validator $validator)
    {
        $validator
            ->notEmpty('full_name', 'Họ tên không được để trống')
            ->notEmpty('phone', 'SĐT không được để trống')
            ->notEmpty('email', 'Email không được để trống')
            ->notEmpty('birthday', 'Vui lòng chọn ngày sinh')
            ->numeric('phone', 'SĐT phải ở dạng số')
            ->add("email", "validFormat", [
                "rule" => ["email"],
                "message" => "Vui lòng nhập đúng định dạng email"
            ]);

        return $validator;
    }

   public function validationUpdate_customer(Validator $validator)
    {
        $validator
            ->notEmpty('full_name', 'Họ tên không được để trống')
            ->notEmpty('phone', 'SĐT không được để trống')
            ->notEmpty('email', 'Email không được để trống')
            ->numeric('phone', 'SĐT phải ở dạng số')
            ->add("email", "validFormat", [
                "rule" => ["email"],
                "message" => "Vui lòng nhập đúng định dạng email"
            ]);

        return $validator;
    }

}
