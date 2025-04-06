<?php require_once("utils/functions.php") ?>
<?php require_once("templates/header.php") ?>
<?php
if (isset($_GET['delete_id'])) {
  deleteProduct($_GET['delete_id']);
  header("Location: index.php");
  exit();
}

$products = getAllProducts();
?>


<div class="container mt-4">

  <a href="create.php" class="btn btn-primary mb-3">Добавить новый продукт</a>

  <table class="table table-hover table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Цена</th>
        <th>Скидка</th>
        <th>Финальная цена</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>
        <tr>
          <td><?= $product['id'] ?></td>
          <td><?= $product['name'] ?></td>
          <td><?= $product['category'] ?></td>
          <td><?= $product['price'] . "р." ?></td>
          <td><?= $product['discount'] . "р." ?></td>
          <td><?= $product['price'] - $product['discount'] . "р." ?></td>
          <td>
            <a href="info.php?id=<?= $product['id'] ?>" class="btn btn-info btn-sm">Инфо</a>
            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Редактировать</a>
            <a href="index.php?delete_id=<?= $product['id'] ?>" class="btn btn-danger btn-sm"
              onclick="return confirm('Are you sure?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require_once("templates/footer.php") ?>