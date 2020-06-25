<?= $this->Html->css('index.css') ?>
<?php $this->assign('title','新規登録'); ?>

<div class="index">
  <fieldset>
      <legend><?= __('新規登録') ?></legend>
  <?php
  echo $this->Form->create('users', [
    'type' => 'post',
    'url' => ['controller' => 'Users', 'action' => 'addconfirm'],
  ]);

  echo $this->Form->hidden('id', array('value' => 'addconfirm'));

  echo $this->Form->control('name', ['type' => 'text', 'label' => 'お名前(漢字)']);

  echo $this->Form->control('kana', ['type' => 'text', 'label' => 'お名前(カタカナ)']);

  echo $this->Form->control('tel', ['type' => 'number', 'label' => '電話番号']);

  echo $this->Form->control('mail', ['type' => 'email', 'label' => 'メールアドレス']);

  echo $this->Form->control('address', ['type' => 'text', 'label' => '住所']);

  echo $this->Form->control('password', ['label' => 'パスワード']);

  // 送信ボタン
  echo $this->Form->button('確認画面へ');

  // フォーム終了
  echo $this->Form->end();
  ?>
  </fieldset>
</div>
