<?php
session_start();
require_once '../config/db_connect.php';
require_once '../config/db_classes.php';

$product = null;

if (isset($_POST['product_code'])) {
    $product_code = $_POST['product_code'];
    $conn = get_db_connection();

    $stmt = $conn->prepare(
        "SELECT name, main_category, sub_category, image, discount_price, original_price
        FROM product
        WHERE code = ?"
    );

    $stmt->bind_param("i", $_POST['product_code']);
    $stmt->execute();

    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Lookup</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { margin-bottom: 20px; }
        .product { border: 1px solid #ccc; padding: 20px; max-width: 600px; }
        img { max-width: 100%; height: auto; }
    </style>
</head>
<body>

<h1>Product Lookup</h1>

<form method="POST" action="">
    <label for="product_code">Enter Product Code:</label>
    <input type="text" id="product_code" name="product_code" required>
    <button type="submit">Search</button>
</form>

<?php if ($product): ?>
    <div class="product">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p><strong>Main Category:</strong> <?= $product['main_category'] ?></p>
        <p><strong>Sub Category:</strong> <?= $product['sub_category'] ?></p>
        <p><strong>Price:</strong> <?= $product['discount_price'] ?></p>
        <p><img src="<?= htmlspecialchars($product['image']) ?>"
                alt="<?= htmlspecialchars($product['name']) ?>"></p>
    </div>
<?php elseif ($_POST): ?>
    <p>No product found.</p>
<?php endif; ?>

</body>
</html>