<?php
session_start();

// env file gets turned into dictionary
$env = []; 
$lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    [$key, $value] = explode('=', $line, 2);
    $env[trim($key)] = trim($value);
}

// Store database connection in session
$_SESSION['db_conn'] = new mysqli($env['DB_HOST'], ($env['DB_USER'], ($env['DB_PASS'], ($env['DB_NAME']);
?>