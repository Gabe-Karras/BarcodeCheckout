<?php
require_once 'db_connect.php';
require_once 'db_classes.php';

// Returns db_classes product object associated with code. Returns NULL if not in database
function get_product_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT name, price, description, image, image_type FROM product WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$q_result = $q->get_result();
	if ($q_result->num_rows == 0) {
		$conn->close();
		return NULL;
	}
	
	$row = $q_result->fetch_assoc();
	$result = new Product();
	$result->set_properties($code, $row['name'], $row['price'], $row['description'], $row['image'], $row['image_type']);
	$conn->close();
	return $result;
}

// Adds a product to the database.
// Returns false if unsuccessful (like if a product with the same code already exists)
// $image_name refers to the name you give the file upload field in an html form. This function finds the image data with that name
function add_product($code, $name, $price, $description, $image_name) {
	$conn = get_db_connection();
	try {
		$q = $conn->prepare('INSERT INTO product VALUES (?, ?, ?, ?, ?, ?)');
		$image = file_get_contents($_FILES[$image_name]['tmp_name']);
		$image_type = $_FILES[$image_name]['type'];
		$null = NULL;
		$q->bind_param('isdsbs', $code, $name, $price, $description, $null, $image_type);
		$q->send_long_data(4, $image);
		$q->execute();
		$conn->close();
	} catch (mysqli_sql_exception) {
		$conn->close();
		return false;
	}
	return true;
}

// Removes product from the database
// Returns false if code doesn't exist
function remove_product_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT name FROM product WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$q_result = $q->get_result();
	if ($q_result->num_rows == 0) {
		$conn->close();
		return false;
	}
	
	$q = $conn->prepare('DELETE FROM product WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$conn->close();
	return true;
}

// Returns db_classes member object associated with code. Returns NULL if not in database
function get_member_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT phone, name FROM member WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$q_result = $q->get_result();
	if ($q_result->num_rows == 0) {
		$conn->close();
		return NULL;
	}
	
	$row = $q_result->fetch_assoc();
	$result = new Member();
	$result->set_properties($code, $row['phone'], $row['name']);
	$conn->close();
	return $result;
}

// Returns db_classes member object associated with phone number. Returns NULL if not in database
function get_member_by_phone($phone) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT code, name FROM member WHERE phone=?');
	$q->bind_param('i', $phone);
	$q->execute();
	$q_result = $q->get_result();
	if ($q_result->num_rows == 0) {
		$conn->close();
		return NULL;
	}
	
	$row = $q_result->fetch_assoc();
	$result = new Member();
	$result->set_properties($row['code'], $phone, $row['name']);
	$conn->close();
	return $result;
}

// Adds a member to the database
// Returns false if unsuccessful (like if a member with the same code/phone already exists)
function add_member($code, $phone, $name) {
	$conn = get_db_connection();
	try {
		$q = $conn->prepare('INSERT INTO member VALUES (?, ?, ?)');
		$q->bind_param('iis', $code, $phone, $name);
		$q->execute();
		$conn->close();
	} catch (mysqli_sql_exception) {
		$conn->close();
		return false;
	}
	return true;
}

// Removes member from the database with code
// Returns false if code doesn't exist
function remove_member_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT name FROM member WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$q_result = $q->get_result();
	if ($q_result->num_rows == 0) {
		$conn->close();
		return false;
	}
	
	$q = $conn->prepare('DELETE FROM member WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$conn->close();
	return true;
}

// Removes member from the database with phone
// Returns false if phone doesn't exist
function remove_member_by_phone($phone) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT name FROM member WHERE phone=?');
	$q->bind_param('i', $phone);
	$q->execute();
	$q_result = $q->get_result();
	if ($q_result->num_rows == 0) {
		$conn->close();
		return false;
	}
	
	$q = $conn->prepare('DELETE FROM member WHERE phone=?');
	$q->bind_param('i', $phone);
	$q->execute();
	$conn->close();
	return true;
}
?>