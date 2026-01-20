<?php
class Product {
	public $code;
	public $name;
	public $price;
	public $description;
	public $image;
	public $image_type;
	
	function set_properties($code, $name, $price, $description, $image, $image_type) {
		$this->code = $code;
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
		$this->image = $image;
		$this->image_type = $image_type;
	}
}

class Member {
	public $code;
	public $name;
	public $phone;
	
	function set_properties($code, $name, $phone) {
		$this->code = $code;
		$this->name = $name;
		$this->phone = $phone;
	}
}
?>