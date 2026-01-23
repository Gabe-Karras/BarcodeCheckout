<?php
session_start();
require_once '../config/db_functions.php';

if (add_product($_POST['code'], $_POST['name'], $_POST['price'], $_POST['description'], 'image')) {
	echo 'Product added!';
} else {
	echo 'Failed to add.';
}
?>

<html>
<body>

<br>
<h2>Product:</h2>
<br>

<?php
$product = get_product_by_code($_POST['code']);
if ($product != NULL) {
	echo 'Code: ' . $_POST['code'] . '<br>
	Name: ' . $product->name . '<br>
	Price: ' . $product->price . '<br>
	Description: ' . $product->description . '<br>';
	$encoded_image = base64_encode($product->image);
	echo '<image src="data:' . $product->image_type . ';base64,' . $encoded_image . '">';
} else {
	echo 'Failed to get product.';
}
?>

<form action="input_test.php">
	<button type="submit">Back</button>
</form>

</body>
</html>