<?php
require_once __DIR__ . '/../config/receipt_functions.php';
generate_receipt_from_session();
download_receipt();
?>