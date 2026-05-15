<?php
require_once '../config/config.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';
$controller = new AuthController();

switch($action) {
    case 'login':
        $controller->login();
        break;
    case 'register':
        $controller->register();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        echo json_encode(['success' => false, 'message' => 'Nieznana akcja']);
}
