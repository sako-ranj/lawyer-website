<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'sakoranj');
define('DB_PASS', '123456');
define('DB_NAME', 'lawyer');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    # code...
    die("Connection Failed " . $conn->connect_error);
}