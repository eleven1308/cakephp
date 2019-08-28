<?php
namespace App\Controller;

class UsersController extends AppController
{
    /**
     * User Login
     */
    public function login()
    {
        $user = $this->request->session()->read('Auth.User');
        if($user){
            return $this->redirect('/customers');
        }
        $this->set('title', 'User Login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Tên đăng nhập hoặc mật khẩu sai');
        }
    }

    /**
     * User Registration
     */
    public function register()
    {
        $this->set('title', 'User Register');

        $users = $this->Users->newEntity($this->request->getData(), ['validate' => 'register']);
        if ($this->request->is('post') && !empty($this->request->getData()))
        {
            if (empty($users->getErrors()))
            {
                $users = $this->Users->patchEntity($users, $this->request->getData(), ['validate' => 'register']);
                
                # Set Data in Table
                $birthday = $this->request->getData('birthday');
                $date_replace = str_replace('/', '-', $birthday);
                $new_date =  date('Y-m-d', strtotime($date_replace));
                $users->bithday = $new_date;
                # Save Data
                if ($this->Users->save($users)) {
                    $this->Flash->success(__('Đăng kí thành công'));
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Đăng ký thất bại'));
            }
        }
        // Set this errors in fields
        $this->set('users', $users);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout(),$this->Flash->success(__('Đăng xuất thành công')));
        
    }
}