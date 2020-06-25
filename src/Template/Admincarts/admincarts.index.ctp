<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="admincarts index large-9 medium-8 columns content">
    <h3><?= __('注文リスト') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('注文番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('購入者番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('商品番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('商品名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('購入数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('合計金額') ?></th>
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admincarts as $admincart): ?>
            <tr>
                <td><?= $this->Number->format($admincart->id) ?></td>
                <td><?= h($admincart->users_id) ?></td>
                <td><?= h($admincart->items_id) ?></td>
                <td><?= h($admincart->items_name) ?></td>
                <td><?= $this->Number->format($admincart->quantity) ?></td>
                <td><?= $this->Number->format($admincart->totalprice) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $admincart->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admincart->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admincart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admincart->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
