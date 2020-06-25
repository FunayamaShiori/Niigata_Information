<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\RedirectCheckerForm;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class CartsController extends AppController
{

  public function beforeFilter(Event $event){
    parent::beforeFilter($event);
    $this->Auth->allow(['admincarts','delete']);
  }

 public function index()
 {

 }

 public function buyadd()
 {
   $this->Auth->allow();
   $this->set('users_id', $this->Auth->user('id'));
   // セッションオブジェクトの取得
   $items_id = $this->request->data('items_id');
   $session = $this->request->session();
   // データが存在するか、nullでないか確認、もしcartsにデータが存在していたら、
   if($session->check('carts')) {
     //もしセッションにあるitems_idと$items_idが一致していたら、field(数量)を足し算する
     $carts = $session->read('carts');
     if(isset($carts[$items_id])) {
       $session->write([
         'carts' => [
           $items_id =>[
             'name' => $this->request->data('name'),
             'field' => $this->request->data('field') + $carts[$items_id]['field'],
             'price' => $this->request->data('price')],
           ]
         ]);
         //データを保存する
         $this->set('carts', $session->read('carts'));
       //もしセッションにあるitems_idと$items_idが一致していなかったら、そのまま$cartsに入れる
       } else {
         $session->write([
           'carts' => [
             $items_id =>[
               'name' => $this->request->data('name'),
               'field' => $this->request->data('field'),
               'price' => $this->request->data('price')],
             ]
           ]);
           //データを保存する
           $this->set('carts', $session->read('carts'));
       }
    //$cartsにデータが存在していなかったらそのまま保存する
    } else {
     $session->write([
       'carts' => [
         $items_id =>[
          'name' => $this->request->data('name'),
          'field' => $this->request->data('field'),
          'price' => $this->request->data('price')],
        ]
      ]);
      // セッションデータの読み込み
      $this->set('carts', $session->read('carts'));
  }
}

  public function buycomplete()
  {
    $cartsTable = TableRegistry::get('Carts');
    $carts = $cartsTable->newEntity($this->request->data);
    $cartsTable->save($carts);
  }

  public function admincarts(){
    $carts = $this->paginate($this->Carts);

    $this->set(compact('carts'));
  }


  public function view($id = null)
    {
      $users = $this->Users->find()->all();
      $this->log($users, "debug");
    }

 public function isAuthorized($user)
 {
    return true;
  }

  public function edit($id = null)
  {
      $cart = $this->Carts->get($id, [
          'contain' => [],
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $cart = $this->Carts->patchEntity($cart, $this->request->getData());
          if ($this->Carts->save($cart)) {
              $this->Flash->success(__('The cart has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The cart could not be saved. Please, try again.'));
      }
      $this->set(compact('cart'));
  }

  public function delete($id = null)
  {
      $this->request->allowMethod(['delete']);
      $cart = $this->Carts->get($id);
      if ($this->Carts->delete($cart)) {
          $this->Flash->success(__('The user has been deleted.'));
      } else {
          $this->Flash->error(__('The user could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'buyadd']);
  }
}
