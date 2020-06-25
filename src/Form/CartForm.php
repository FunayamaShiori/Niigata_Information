<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class CartForm extends Form
{
  protected function _buildSchema(Schema $schema)
 {
   // フィールドセット
   return $schema->addField('quantity')
 }

 protected function _buildValidator(Validator $validator)
 {
   // バリデーションセット
   return $validator->add('quantity' [
   'rule' => ['minLength', 10],
   ]);
 }

 protected function _execute(array $data)
 {
 // バリデーションが通った時に実行されます。
 // ここでは単にtrueを返すだけです。
 return true;
 }
}
?>
