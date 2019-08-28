<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    // public function validationDefault(Validator $validator) {
    // }

    /**
     * User Registration Form Validation
     */
    
    public function initialize(array $config)
    {
        $this->setTable('users');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function validationRegister(Validator $validator)
    {
        # Full Name
        $validator->notEmpty('full_name', 'Họ tên không được để trống')
                  ->lengthBetween('full_name', [4,12], 'Họ tên phải từ 4 đến 12 kí tự');
        # Email Address
        $validator->notEmpty('email', 'Email không được để trống')
                  ->add('email', 'valid', [
                        'rule' => 'email',
                        'message' => 'Please enter valid email',
            ]);
        # Username
        $validator->notEmpty('username', 'Username không được để trống')
                  ->lengthBetween('username', [4,12], 'User phải từ 4 đến 12 kí tự');
        $validator->notEmpty('numberphone', 'Số điện thoại không được để trống')
                  ->lengthBetween('numberphone', [10,12], 'Số điện thoại phải từ 10 kí tự trở lên')
                  ->numeric('numberphone', 'SĐT phải ở dạng số');
        # Password
        $validator->notEmpty('password', 'Password không được để trống')
                  ->lengthBetween('password', [4,12], 'User phải từ 4 đến 12 kí tự');
        # Confirm Password
        $validator->notEmpty('confirmpassword', 'Vui lòng xác nhận lại mật khẩu')
                  ->add('confirmpassword', 'no-misspelling', [
                        'rule' => ['compareWith', 'password'],
                        'message' => 'Mật khẩu xác nhận không đúng',
            ]);
        
        return $validator;
    }
} 