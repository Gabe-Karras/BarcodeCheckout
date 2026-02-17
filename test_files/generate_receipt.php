<?php

session_start();
require_once '../config/receipt_functions.php';

$codes = explode(' ', $_POST['codes']);
generate_receipt($codes, 'card', true);
download_receipt();
?>

<html>
<body>

<form action="input_test.php">
	<button type="submit">Back</button>
</form>

</body>
</html>