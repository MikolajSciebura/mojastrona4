<?php
require_once '../config/config.php';

$controller = new AuthController();
$controller->render('account/login', [
    'page_title' => 'Logowanie - MSTechPC'
]);
