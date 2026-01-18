<?php
session_start();
require_once 'db_connect.php';
require_once 'db_classes.php';

// Returns product object associated with code. Returns NULL if not in database
function get_product_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT name, price, description, image, image_type FROM product WHERE code=?');
	$q->bind_param('i', $code);
	$q_result = $q.execute();
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

// Adds a product to the database
function add_product($code, $name, $price, $description, $image_name) {
	$conn = get_db_connection();
	$q = $conn->prepare('INSERT INTO product VALUES (?, ?, ?, ?, ?, ?)');
	$image = file_get_contents($_FILES[$image_name]['tmp_name']);
	$image_type = $_FILES[$image_name]['type'];
	$q->bind_param('isdsbs', $code, $name, $price, $description, $image, $image_type);
	$q->execute();
	$conn->close();
}

// Removes product from the database
function remove_product_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('DELETE FROM product WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$conn->close();
}

// Returns member object associated with code. Returns NULL if not in database
function get_member_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT phone, name FROM member WHERE code=?');
	$q->bind_param('i', $code);
	$q_result = $q.execute();
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

// Returns member object associated with phone number. Returns NULL if not in database
function get_member_by_phone($phone) {
	$conn = get_db_connection();
	$q = $conn->prepare('SELECT code, name FROM member WHERE phone=?');
	$q->bind_param('i', $phone);
	$q_result = $q.execute();
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
function add_member($code, $phone, $name) {
	$conn = get_db_connection();
	$q = $conn->prepare('INSERT INTO product VALUES (?, ?, ?)');
	$q->bind_param('iis', $code, $phone, $name);
	$q->execute();
	$conn->close();
}

// Removes product from the database
function remove_member_by_code($code) {
	$conn = get_db_connection();
	$q = $conn->prepare('DELETE FROM member WHERE code=?');
	$q->bind_param('i', $code);
	$q->execute();
	$conn->close();
}

// Removes product from the database
function remove_member_by_phone($phone) {
	$conn = get_db_connection();
	$q = $conn->prepare('DELETE FROM member WHERE phone=?');
	$q->bind_param('i', $phone);
	$q->execute();
	$conn->close();
}
?>