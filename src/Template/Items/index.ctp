<?= $this->Html->css('index.css') ?>
<?php $this->assign('title','新潟特産物サイト'); ?>

<div class="index">
  <h1>商品一覧</h1>
  <ul id="products">
    <?php foreach ($items as $item): ?>
    <li>
      <?php
      echo $this->Html->image(h($item->img_path));
      ?>
      <p><?= h($item->name) ?></p>
      <p><?= h($item->detail) ?></p>
      <p><?= $this->Number->format($item->price) ?>円</p>
      <p><?= h($item->capacity) ?></p>
      <?php
      echo $this->Form->create('items', [
        'type' => 'post',
        'url' => ['controller' => 'Carts', 'action' => 'buyadd'],
        'onsubmit'=>'return confirm("カートに追加しました")',
      ]);

      echo $this->Form->hidden('items_id', array('value' => $item->id));
      echo $this->Form->hidden('img_path', array('value' => $item->img_path));
      echo $this->Form->hidden('name', array('value' => $item->name));
      echo $this->Form->hidden('price', array('value' => $item->price));
      echo $this->Form->hidden('capacity', array('value' => $item->capacity));

      echo $this->Form->select(
        'field',
        [0,1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50],
        ['empty' => '(数量をお選びください)']
      );
      echo $this->Form->button('カートに入れる');

      echo $this->Form->end();

      ?>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
