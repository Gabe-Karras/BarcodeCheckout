<?php
session_start();
require_once 'config/db_functions.php';

if (isset($_POST['name'])) {
	add_product($_POST['code'], $_POST['name'], $_POST['price'], $_POST['description'], 'image');
	unset($_POST['name']);
}

?>

<html>
<body>

<?php
if (isset($_POST['code_get'])) {
	$product = get_product_by_code($_POST['code_get']);
	echo "Name: " . $product->name . " Price: " . $product->price . "Description: " . $product->description;
	unset($_POST['code_get']);
	
	$encoded_image = base64_encode($product->image);
	echo $encoded_image;
	echo '<br>
	<img src="data:' . $product->image_type . ';base64,' . $encoded_image . '" alt="Embedded Image">';
}
?>

<form action="test.php" method="post" enctype="multipart/form-data">
Code: <input type="number" name="code"><br>
Name: <input type="text" name="name"><br>
Price: <input type="number" name="price"><br>
Description: <input type="text" name="description"><br>
Image: <input type="file" name="image" accept="image/*"><br>
<input type="submit">
</form>

<br>
<br>

<form action="test.php" method="post">
Product to display: <input type="number" name="code_get"><br>
<input type="submit">
</form>

</body>
</html>