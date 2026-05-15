<?php
require_once '../config/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$csrf_token = $_POST['csrf_token'] ?? '';
if (!verify_csrf_token($csrf_token)) {
    echo json_encode(['success' => false, 'message' => 'Błąd zabezpieczeń CSRF']);
    exit;
}

$name = h($_POST['name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$subject = h($_POST['subject'] ?? '');
$message = h($_POST['message'] ?? '');

if (!$name || !$email || !$subject || !$message) {
    echo json_encode(['success' => false, 'message' => 'Wypełnij wszystkie pola poprawnie']);
    exit;
}

// In production, send email here
// mail(SITE_EMAIL, "Nowa wiadomość: $subject", "Od: $name <$email>\n\n$message");

echo json_encode(['success' => true, 'message' => 'Dziękujemy! Twoja wiadomość została wysłana.']);
