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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    if (updateProduct($id, $name, $category, $price, $discount)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to update product";
    }
}
?>
<div class="container mt-4">
    <h1>Edit Product</h1>
    <a href="index.php" class="btn btn-secondary mb-3">Back to List</a>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category"
                value="<?= htmlspecialchars($product['category']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price"
                value="<?= htmlspecialchars($product['price']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" step="0.01" class="form-control" id="discount" name="discount"
                value="<?= htmlspecialchars($product['discount']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<?php require_once("templates/footer.php") ?>