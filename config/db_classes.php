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
		// This contains the raw binary contents of an image file
		// You'll have to base64 encode it to embed on a webpage
		$this->image = $image;
		// This contains a string along the lines of 'image/png' which is required for embedding src image data in html
		$this->image_type = $image_type;
	}
}

class Member {
	public $code;
	public $phone;
	public $name;
	
	function set_properties($code, $phone, $name) {
		$this->code = $code;
		$this->phone = $phone;
		$this->name = $name;
	}
}
?>