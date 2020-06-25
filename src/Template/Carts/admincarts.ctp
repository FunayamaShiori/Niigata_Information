
<?php $this->assign('title','管理者ページ'); ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ユーザー一覧'), ['controller' => 'Users', 'action' => 'index']) ?></li>
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
                <th scope="col"><?= $this->Paginator->sort('購入数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('合計金額') ?></th>
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carts as $cart): ?>
            <tr>
                <td><?= $this->Number->format($cart->id) ?></td>
                <td><?= h($cart->users_id) ?></td>
                <td><?= h($cart->items_id) ?></td>
                <td><?= $this->Number->format($cart->field) ?></td>
                <td><?= $this->Number->format($cart->totalprice) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('顧客情報'), ['controller' => 'Users','action' => 'view', $cart->users_id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $cart->id]) ?>
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
