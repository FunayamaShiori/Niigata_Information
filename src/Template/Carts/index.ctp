<?= $this->Html->css('index.css') ?>
<?php $this->assign('title','カート'); ?>

<div class="index">
  <fieldset>
    <legend><?= __('カート') ?></legend>
    <div id="carts">
      <p>商品名：<?= $this->request->data('name'); ?></p>
      <p>金額：<?= $this->request->data('price'); ?>円</p>
      <p>数量：<?= $this->request->data('field'); ?></p>

      <?php
      echo $this->Form->create('cart', [
        'type' => 'post',
        'url' => ['controller' => 'Carts', 'action' => 'buyadd'],
      ]);

      echo $this->Form->hidden('id');
      echo $this->Form->hidden('img_path');
      echo $this->Form->hidden('name');
      echo $this->Form->hidden('price');
      echo $this->Form->hidden('capacity');

      echo $this->Form->hidden('field');

      echo $this->Form->button('購入確認画面へ');

      echo $this->Form->end();
      ?>
    </div>
</fieldset>
</div>
