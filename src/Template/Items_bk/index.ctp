<?= $this->Html->css('index.css') ?>

<div class="index">
  <h1>商品一覧</h1>
  <ul id="products">
    <?php foreach ($items as $item): ?>
    <li>
      <?php
      echo $this->Html->image("items/sake.jpg");
      ?>
      <p><?= h($item->name) ?></p>
      <p><?= h($item->detail) ?></p>
      <p><?= $this->Number->format($item->price) ?>円/p>
      <p><?= h($item->capacity) ?></p>
      <input type="submit" value="カートに入れる" >
    </li>
    <li>
      <?php
      echo $this->Html->image("items/rice.jpg");
      ?>
      <p><?= h($item->name) ?></p>
      <p><?= h($item->detail) ?></p>
      <p><?= $this->Number->format($item->price) ?>円</p>
      <p><?= h($item->capacity) ?></p>
      <input type="submit" value="カートに入れる" >
    </li>
    <li>
      <?php
      echo $this->Html->image("items/vegetables.jpg");
      ?>
      <p><?= h($item->name) ?></p>
      <p><?= h($item->detail) ?></p>
      <p><?= $this->Number->format($item->price) ?>円</p>
      <p><?= h($item->capacity) ?></p>
      <input type="submit" value="カートに入れる" >
    </li>
    <li>
      <?php
      echo $this->Html->image("items/goods.jpg");
      ?>
      <p><?= h($item->name) ?></p>
      <p><?= h($item->detail) ?></p>
      <p><?= $this->Number->format($item->price) ?></p>
      <p><?= h($item->capacity) ?></p>
      <input type="submit" value="カートに入れる" >
    </li>
    <?php endforeach; ?>
  </ul>
</div>
