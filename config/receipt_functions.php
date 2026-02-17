<?php
require_once __DIR__ . '/db_functions.php';
require_once __DIR__ . '/../fpdf/fpdf.php';

/* Takes list of product ids being purchased, string method of payment, 
   and boolean if purchase was made with a membership or not 
   
   Creates receipt.txt in the temp_files folder  */
function generate_receipt($product_codes, $payment_method, $membership) {
	$content = '';
	$total = 0;
	foreach ($product_codes as $code) {
		$item = get_product_by_code($code);
		// Constrain name to 30 characters and price to 2 decimal places
		$content .= sprintf("%-'.35.35s", $item->name);
		$formatted_price = sprintf("$%.2f", $item->price);
		$content .= sprintf(".....%'.10.10s\n", $formatted_price);
		$total += $item->price;
	}

	$savings = 0;
	if ($membership) {
		$savings = 0.1 * $total;
		$total -= $savings;
	}
	$total = sprintf("%.2f", $total);
	$savings = sprintf("%.2f", $savings);

	$content .= "\nPayment method: " . $payment_method;
	if ($membership) {
		$content .= "\nMembership savings: $" . $savings;
	}
	$content .= "\nTotal: $" . $total;

	if (file_exists(__DIR__ . '/../temp_files/receipt.txt')) {
		unlink(__DIR__ . '/../temp_files/receipt.txt');
	}
	file_put_contents(__DIR__ . '/../temp_files/receipt.txt', $content);
}

// Converts current receipt.txt into a pdf and downloads it to the client
function download_receipt() {
	$content = file_get_contents(__DIR__ . '/../temp_files/receipt.txt');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetLeftMargin(40);
	$pdf->Image(__DIR__ . '/../Webpage/Receipt_Image.png', 70, null, null, 30);
	$pdf->SetY(50);
	$pdf->SetFont('courier','',12);
	$pdf->Write(5, $content);
	$pdf->Output('D','receipt.pdf');
}

?>