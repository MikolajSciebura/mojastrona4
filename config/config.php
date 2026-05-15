<?php
/**
 * Global Site Configuration
 */

// Environment
define('DEV_MODE', true);

// Site Info
define('SITE_NAME', 'MSTechPC');
define('SITE_URL', 'https://mstechpc.pl');
define('SITE_EMAIL', 'kontakt@mstechpc.pl');
define('SITE_PHONE', '+48 000 000 000');
define('SITE_ADDRESS', 'ul. Przykładowa 1, 42-200 Częstochowa');

// Paths
define('BASE_PATH', dirname(__DIR__));

// Detect Base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptPath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$scriptFileName = str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME'] ?? '');
$docRoot = str_replace($scriptPath, '', $scriptFileName);
$projectRoot = str_replace('\\', '/', BASE_PATH);
$baseDir = str_replace($docRoot, '', $projectRoot);
$baseUrl = $protocol . "://" . $host . $baseDir;

define('BASE_URL', $baseUrl);
define('ASSETS_PATH', BASE_URL . '/assets');

// Security
define('SESSION_LIFETIME', 3600);

// Autoloader for Classes, Models, and Controllers
spl_autoload_register(function ($class) {
    $paths = ['/classes/', '/models/', '/controllers/'];
    foreach ($paths as $path) {
        $file = BASE_PATH . $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Global Helpers
function h($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

function csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token ?? '');
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}
