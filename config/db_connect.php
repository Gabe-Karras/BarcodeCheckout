<?php
session_start();

// Returns a mysqli object connected to a database specified in the .env file
function get_db_connection() {
	if (!isset($_SESSION['db_info'])) {
		// env file gets turned into dictionary
		$env = []; 
		$lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	
		foreach ($lines as $line) {
			[$key, $value] = explode('=', $line, 2);
			$env[trim($key)] = trim($value);
		}
		
		// Test connection before storing .env info
		$conn = new mysqli($env['DB_HOST'], ($env['DB_USER'], ($env['DB_PASS'], ($env['DB_NAME']);
		if ($conn->connect_error) {
			return NULL;
		}
	
		// Store successful database connection info in session
		$_SESSION['db_info'] = $env;
		return $conn;
	}
	
	return new mysqli($_SESSION['db_info']['DB_HOST'], $_SESSION['db_info']['DB_USER'], $_SESSION['db_info']['DB_PASS'], $_SESSION['db_info']['DB_NAME']);
}
?>