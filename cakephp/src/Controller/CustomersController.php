<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Model\Table\Customer_GroupTable;
class CustomersController extends AppController
{

    public $paginate = [
        'limit' => 10
        
    ];

	public function initialize()
    {
        parent::initialize();
         
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $this->set('title', 'Customers');
        $keyword = $this->request->query('full_name');
        $phone = (int)$this->request->query('phone');
        $email = $this->request->query('email');
        $date_start = $this->request->query('date_start');
        $date_end = $this->request->query('date_end');
        // dd($start_old, $end_old);
        // die; ,
        if (!empty($keyword)) {
            $this->paginate =
                ['conditions' => ['full_name LIKE' => '%' . $keyword . '%']];
        }
        if (!empty($phone)) {
            $this->paginate =
                ['conditions' => ['phone LIKE' => '%' . $phone . '%']];
        }
        if (!empty($email)) {
            $this->paginate =
                ['conditions' => ['email LIKE' => '%' . $email . '%']];
        }
        if (!empty($date_start) && !empty($date_end)) {
            $this->paginate =
                ['conditions' =>
                    [
                        'DATE(customers.bithday) >=' => $date_start,
                        'DATE(customers.bithday) <=' => $date_end
                    ]
                ];
        }
        // $customerx = $this->paginate($this->Customers->find('all')->order(['Customers.email' => 'DESC']));
        $customers = $this->paginate($this->Customers);
        $customer_group = TableRegistry::get('customer_group')->find()->all();
        // dd($customer_group);
        $this->paginate['contain'] = ['customer_group'];
        // $this->set('customers', $customerx);
        $this->set(compact('customers', 'customer_group'));
        // $resultJ = array('Hihi' => 'OK' , 'HAHA' => 'OK' );
        // $hoho = json_encode($resultJ);
        // $this->response->type('json');
        // $this->response->body($resultJ);
        // return $this->response;
    }

    public function add()
    {
        $this->set('title', 'Customers');
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post') AND !empty($this->request->getData())) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData(), [
                'validate' => 'create_customer'
            ]);
            if ($customer->errors()) {
                $this->Flash->error('Vui lòng kiểm tra lại các trường!');
            } else {
                $customer->full_name = $this->request->getData('full_name');
                $customer->phone = $this->request->getData('phone');
                $customer->email = $this->request->getData('email');
                $group = $this->request->getData('group');
                $birthday = $this->request->getData('birthday');
                $customer->bithday = $birthday; 
                // $date_replace = str_replace('/', '-', $birthday);
                // $new_date =  date('Y-m-d', strtotime($date_replace));
                // $customer->bithday = $new_date;
                if ($this->Customers->save($customer)) {
                    // $customer_group = $this->loadModel('customer_group');
                    $customer_grouptable = TableRegistry::get('customer_group');
                    if($group){
                        foreach ($group as $gr) {
                            $customer_group = $customer_grouptable->newEntity();
                            $customer_group->customer_id = $customer['id'];
                            $customer_group->group_id = $gr;
                            $customer_grouptable->save($customer_group);
                        }
                    }
                    $this->redirect('/customers');
                    $this->Flash->success(__('Thêm  khách hàng thành công'));
                } else {
                    $this->Flash->error(__('Thêm mới thất bại'));
                }
            }
        }

        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }

    public function edit($id = null)
    {
         $customer_table = TableRegistry::get('customers');
        
         $customer_grouptable = TableRegistry::get('customer_group');
         $groupid = array();
         $data = $customer_grouptable->find()->where(['customer_id =' => $id])->all();
         foreach ($data as $value) {
             array_push($groupid, $value['group_id']);
         }
         $customer = $customer_table->get($id);
         $birthday = $customer->bithday;
         $new_birthday =  date_format($birthday,"Y-m-d");
         if ($this->request->is(['post', 'put'])) {
            $group = $this->request->getData('group');
            $customer->bithday = $this->request->getData('birthday');
            $customer_update = $customer_table->patchEntity($customer,$this->request->getData(), 
            ['validate' => 'update_customer']);
            // dd($customer_update);
            if($customer_table->save($customer_update)){
                foreach ($data as $key => $dt) {
                    $customer_grouptable->delete($dt);
                }
                foreach ($group as $gr) {
                    $customer_group = $customer_grouptable->newEntity();
                    $customer_group->customer_id = $customer['id'];
                    $customer_group->group_id = $gr;
                    $customer_grouptable->save($customer_group);
                }
                    
                $this->Flash->success(__('Chỉnh sửa thành công'));
                $this->redirect('/customers');
            }else{
                $this->Flash->error(__('chỉnh sua that bai'));
            }
         }
        $this->set(compact('customer', 'groupid', 'new_birthday'));
    }

    public function view($id = null){
        $customer_id = TableRegistry::get('customers')->get($id);
        $group_id = TableRegistry::get('customer_group')->find()->where(['customer_id =' =>  $id])->all();
        $this->set(compact('customer_id','group_id'));


    }
    public function search()
    {

        $this->request->allowMethod('ajax');
        $keyword = $this->request->query('keyword');
        $query = $this->Customers->find('all',[
              'conditions' => ['name LIKE'=>'%'.$keyword.'%'],
              'order' => ['Tags.id'=>'DESC'],
              'limit' => 10
        ]);
        $this->set('customers', $this->paginate($query));
        $this->set('_serialize', ['customers']);

    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        $customer_group = TableRegistry::get('customer_group');
        $data = $customer_group->find()->where(['customer_id =' => $id])->all();
        // $cus_grtable = $this->loadModel('customer_group');
        if($data){
            foreach ($data as $key => $value) {
              $customer_group->delete($value);
            }  
        } 
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('Xóa Thành Công'));
        } else {
            $this->Flash->error(__('Dữ liệu chưa được xóa, vui lòng thử lại'));
        }

        return $this->redirect(['action' => 'index']);
    }
}