<?php
class Product {
	public $code;
	public $name;
	public $price;
	public $description;
	public $image;
	
	function set_properties($code, $name, $price, $description, $image) {
		$this->code = $code;
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
		$this->image = $image;
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