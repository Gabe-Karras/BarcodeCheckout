<?php
require_once "db_functions.php";

/* Takes list of product ids being purchased, string method of payment, 
   and boolean if purchase was made with a membership or not */
function generate_receipt($product_codes, $payment_method, $membership) {
	$content = "";
	$total = 0;
	foreach ($product_codes as $code) {
		$item = get_product_by_code($code);
		$content .= $item->name . "\t$" . $item->price . "\n";
		$total += $item->price;
	}

	$content .= "\nPayment method: " . $payment_method;
	$content .= "\nTotal: $" . $total;

	if (file_exists("../temp_files/receipt.txt")) {
		unlink("../temp_files/receipt.txt");
	}
	file_put_contents(__DIR__ . "/../temp_files/receipt.txt", $content);
}

?>