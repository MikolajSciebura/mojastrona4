<?php
require_once '../config/config.php';
require_once '../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$action = $_GET['action'] ?? '';
$db = Database::getInstance()->getConnection();
$auth = new Auth($db);

if ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $csrf_token = $_POST['csrf_token'] ?? '';

    if (!verify_csrf_token($csrf_token)) {
        echo json_encode(['success' => false, 'message' => 'CSRF validation failed']);
        exit;
    }

    $user = $auth->login($email, $password);
    if ($user) {
        echo json_encode(['success' => true, 'message' => 'Zalogowano pomyślnie']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Błędny e-mail lub hasło']);
    }
} elseif ($action === 'register') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $csrf_token = $_POST['csrf_token'] ?? '';

    if (!verify_csrf_token($csrf_token)) {
        echo json_encode(['success' => false, 'message' => 'CSRF validation failed']);
        exit;
    }

    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Wszystkie pola są wymagane']);
        exit;
    }

    if ($auth->register($name, $email, $password)) {
        echo json_encode(['success' => true, 'message' => 'Konto zostało utworzone. Możesz się zalogować.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Użytkownik o takim e-mailu już istnieje']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
