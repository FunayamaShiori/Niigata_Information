
<?php $this->assign('title','新規登録'); ?>
<?php echo $this->Form->create(false,array('type' => 'post','action' => 'addcomplete')); ?>

<div class="index">
  <fieldset>
      <legend><?= __('下記内容で登録してよろしいでしょうか') ?></legend>
        <?php

        echo $this->Form->control('name', ['label' => 'お名前(漢字)']);
        echo $this->Form->control('kana', ['label' => 'お名前(カタカナ)']);
        echo $this->Form->control('tel', ['label' => '電話番号']);
        echo $this->Form->control('mail', ['label' => 'メールアドレス']);
        echo $this->Form->control('address', ['label' => '住所']);
        echo $this->Form->control('password', ['label' => 'パスワード']);

        echo $this->Form->button('登録する');
        echo $this->Form->end();

        ?>
  </fieldset>
</div>
