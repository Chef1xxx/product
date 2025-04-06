<?php require_once("utils/functions.php") ?>
<?php require_once("templates/header.php") ?>
<?php

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit(); 
}

$product = getProductById($_GET['id']);
if (!$product) {
    header("Location: index.php");
    exit();
}
?>
  <div class="container mt-4">
        <h1>Информация о продукте</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Назад</a>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $product['name'] ?></h5>
                <p class="card-text">
                    Категория: <?= $product['category'] ?><br>
                    Цена <?= $product['price'] . "р." ?><br>
                    Скидка <?= $product['discount'] . "р." ?><br>
                    Цена со скидкой <?= $product['price'] - $product['discount'] . "р." ?><br>
                </p>
                <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-warning">Редактировать</a>
            </div>
        </div>
    </div>

<?php require_once("templates/footer.php") ?>
