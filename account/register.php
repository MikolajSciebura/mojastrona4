<?php
require_once '../config/config.php';

$controller = new AuthController();
$controller->render('account/register', [
    'page_title' => 'Rejestracja - MSTechPC'
]);
