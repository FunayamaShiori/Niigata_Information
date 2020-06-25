<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmincartsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
     public function index(){
       $admincarts = $this->paginate($this->Admincarts);

         $this->set(compact('admincarts'));


     }

     /**
      * View method
      *
      * @param string|null $id User id.
      * @return \Cake\Http\Response|null
      * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
      */
     public function view($id = null)
     {
         $admincart = $this->Admincarts->get($id, [
             'contain' => [],
         ]);

         $this->set('admincart', $admincart);
     }

     /**
      * Add method
      *
      * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
      */

    public function add()
    {

    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
