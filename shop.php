<?php
require_once 'config/config.php';
$controller = new ShopController();

if (isset($_GET['slug'])) {
    $controller->product();
} else {
    $controller->index();
}
