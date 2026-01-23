<?php
session_start();
require_once '../config/db_functions.php';

if (isset($_POST['code'])) {
	if (remove_member_by_code($_POST['code'])) {
		echo 'Member removed.';
	} else {
		echo 'Failed to remove.';
	}
} else {
	if (remove_member_by_phone($_POST['phone'])) {
		echo 'Member removed.';
	} else {
		echo 'Failed to remove.';
	}
}
?>

<br>
<form action="input_test.php">
	<button type="Submit">Back</button>
</form>