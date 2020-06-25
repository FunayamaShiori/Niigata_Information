<?= $this->Html->css('index.css') ?>
<?php $this->assign('title','ログイン'); ?>

<div class="index">
  <?= $this->Flash->render('auth') ?>
  <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('ログイン') ?></legend>
        <?= $this->Form->input('mail') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('ログイン')); ?>
<?= $this->Form->end() ?>
</div>
