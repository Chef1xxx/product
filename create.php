<?php require_once("utils/functions.php") ?>
<?php require_once("templates/header.php") ?>
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    if (createProduct($name, $category, $price, $discount)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to create product";
    }
}
?>
<div class="container mt-4">
    <h1>Создать новый продукт</h1>
    <a href="index.php" class="btn btn-secondary mb-3">Назад</a>


    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" step="0.01" class="form-control" id="discount" name="discount" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
<?php require_once("templates/footer.php") ?>