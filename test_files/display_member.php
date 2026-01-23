<?php
session_start();
require_once '../config/db_functions.php';

if (add_member($_POST['code'], $_POST['phone'], $_POST['name'])) {
	echo 'Member added!';
} else {
	echo 'Failed to add.';
}
?>

<html>
<body>

<br>
<h2>Member by code:</h2>
<br>

<?php
$member = get_member_by_code($_POST['code']);
if ($member != NULL) {
	echo 'Code: ' . $_POST['code'] . '<br>
	Phone: ' . $member->phone . '<br>
	Name: ' . $member->name . '<br>';
} else {
	echo 'Failed to get member.';
}
?>

<h2>Member by phone:</h2>
<br>

<?php
$member = get_member_by_phone($_POST['phone']);
if ($member != NULL) {
	echo 'Code: ' . $member->code . '<br>
	Phone: ' . $_POST['phone'] . '<br>
	Name: ' . $member->name . '<br>';
} else {
	echo 'Failed to get member.';
}
?>

<form action="input_test.php">
	<button type="submit">Back</button>
</form>

</body>
</html>