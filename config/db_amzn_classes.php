<?php
class Product {
	public $code;
	public $name;
	public $main_category;
    public $sub_category;
	public $image;
	public $discount_price;
    public $original_price;
	
	function set_properties($code, $name, $main_category, $sub_category, $image, $discount_price, $original_price) {
		$this->code = $code;
		$this->name = $name;
		$this->main_category = $main_category;
		$this->sub_category = $sub_category;
		$this->image = $image;
        $this->discount_price = $discount_price;
        $this->original_price = $original_price;
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