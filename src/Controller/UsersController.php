<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    // public function index()
    // {
    //     $users = $this->paginate($this->Users);
    //
    //     $this->set(compact('users'));
    // }

    public function beforeFilter(Event $event){
      parent::beforeFilter($event);
      $this->Auth->allow(['logout', 'add', 'addconfirm', 'addcomplete']);
    }

    public function index(){
      $users = $this->paginate($this->Users);

        $this->set(compact('users'));
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
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add(){
    }

    public function addconfirm()
    {
    }

    public function addcomplete(){
      //パスワードをハッシュ化する
     $usersTable = TableRegistry::get('Users');
     $users = $usersTable->newEntity($this->request->data);
     $usersTable->save($users);
   }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->isPost()) {
            $user = $this->Auth->identify();
            if (!empty($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success('ログインしました。');
                return $this->redirect($this->Auth->redirectUrl('/items'));
                $this->Auth->user('id');
            }
            $this->Flash->error('ユーザー名またはパスワードが間違っています。');
        }
    }

    public function logout()
    {
        $this->request->session()->destroy();
        $this->Flash->success('ログアウトしました。');
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
      return true;
    }


}
