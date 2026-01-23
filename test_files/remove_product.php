<?php
session_start();
require_once '../config/db_functions.php';

if (remove_product_by_code($_POST['code'])) {
	echo 'Product removed.';
} else {
	echo 'Failed to remove.';
}
?>

<br>
<form action="input_test.php">
	<button type="Submit">Back</button>
</form>