<?php
require_once 'config/config.php';

$router = new Router();

// Define Routes
$router->add('', ['HomeController', 'index']);
$router->add('index.php', ['HomeController', 'index']);
$router->add('kontakt', ['HomeController', 'kontakt']);
$router->add('serwis', ['HomeController', 'serwis']);

$router->add('shop', ['ShopController', 'index']);
$router->add('shop.php', ['ShopController', 'index']);
$router->add('product', ['ShopController', 'product']);
$router->add('cart', ['ShopController', 'cart']);
$router->add('checkout', ['ShopController', 'checkout']);

$router->add('configurator', ['ConfiguratorController', 'index']);
$router->add('configurator.php', ['ConfiguratorController', 'index']);

$router->add('blog', ['BlogController', 'index']);
$router->add('blog.php', ['BlogController', 'index']);
$router->add('blog/post', ['BlogController', 'post']);

$router->add('account/login', ['AuthController', 'login']);
$router->add('account/register', ['AuthController', 'register']);
$router->add('account/logout', ['AuthController', 'logout']);
$router->add('account/dashboard', ['AccountController', 'dashboard']);

$router->add('admin', ['AdminController', 'index']);
$router->add('admin/dashboard', ['AdminController', 'dashboard']);

// Dispatch
$url = $_SERVER['REQUEST_URI'];
$router->dispatch($url);
