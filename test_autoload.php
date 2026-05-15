<?php
require_once 'config/config.php';
try {
    $db = Database::getInstance()->getConnection();
    echo "DB Connected\n";
    $product = new Product();
    echo "Product Class Loaded\n";
    $user = new User();
    echo "User Class Loaded\n";
    $controller = new HomeController();
    echo "HomeController Class Loaded\n";
    echo "SUCCESS\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
