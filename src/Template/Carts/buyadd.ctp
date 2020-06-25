<?= $this->Html->css('index.css') ?>
<?php $this->assign('title','カート'); ?>

<div class="index">
  <fieldset>
    <legend><?= __('ご購入内容確認') ?></legend>
    　<table>
        <thead>
            <tr>
              <th>商品名</th>
              <th>数量</th>
              <th>合計金額</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($carts as $cart): ?>
            <tr>
              <td><?= $cart['name'] ?></td>
              <td><?= $cart['field'] ?></td>
              <td><?= $cart['totalprice'] = $cart['field'] * $cart['price'] ?></td>
              <td class="actions">
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart['name']], ['confirm' => __('Are you sure you want to delete # {0}?', $cart['name'])]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    echo $this->Form->create('cart', [
      'type' => 'post',
      'url' => ['controller' => 'Carts', 'action' => 'buycomplete'],
      'onsubmit'=>'return confirm("購入が完了しました")',
    ]);
    echo $this->Form->hidden('items_id');
    echo $this->Form->hidden('users_id',array('value' => $users_id));
    echo $this->Form->hidden('field',array('value' => $cart['field']));
    echo $this->Form->hidden('totalprice',array('value' => $cart['totalprice']));
    echo $this->Form->button('購入完了する');

    echo $this->Form->end();

    ?>
  </fieldset>
  </div>
