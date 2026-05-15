<?php
require_once dirname(__DIR__) . '/config/config.php';
// Mock admin check for demo purposes
// if (!isset($_SESSION['admin_id'])) { header('Location: ' . BASE_URL . '/account/login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora - MSTechPC</title>
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/components.css">
</head>
<body class="admin-body">

<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-logo mb-2">
            <h2 class="text-gradient">MSTech Admin</h2>
        </div>
        <nav class="admin-nav">
            <a href="#" class="admin-nav-item active">Dashboard</a>
            <a href="#" class="admin-nav-item">Produkty</a>
            <a href="#" class="admin-nav-item">Zamówienia</a>
            <a href="#" class="admin-nav-item">Klienci</a>
            <a href="#" class="admin-nav-item">Blog</a>
            <a href="#" class="admin-nav-item">Ustawienia</a>
        </nav>
        <div class="mt-2">
            <a href="<?php echo BASE_URL; ?>/index.php" class="btn btn-outline w-100">Powrót do strony</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <header class="flex-between mb-2 align-center">
            <h1>Dashboard</h1>
            <div class="admin-user-info">
                Witaj, <strong>Administrator</strong>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="admin-stats-grid">
            <div class="admin-stat-card">
                <span class="text-muted">Dzisiejsza Sprzedaż</span>
                <h2 class="mt-1">12 499 zł</h2>
                <div class="mt-1 stat-trend-up">↑ 12% vs wczoraj</div>
            </div>
            <div class="admin-stat-card">
                <span class="text-muted">Nowe Zamówienia</span>
                <h2 class="mt-1">8</h2>
                <div class="mt-1 stat-trend-up">↑ 4 od rana</div>
            </div>
            <div class="admin-stat-card">
                <span class="text-muted">Oczekujące Wiadomości</span>
                <h2 class="mt-1">3</h2>
                <span class="text-muted fs-sm">Wymagają odpowiedzi</span>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="card">
            <h3 class="mb-2 text-white">Ostatnie Zamówienia</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Klient</th>
                        <th>Produkt</th>
                        <th>Kwota</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1024</td>
                        <td>Jan Kowalski</td>
                        <td>MSTech Venom</td>
                        <td>18 499 zł</td>
                        <td><span class="status-pill status-sent">Wysłano</span></td>
                    </tr>
                    <tr>
                        <td>#1023</td>
                        <td>Anna Nowak</td>
                        <td>Konfiguracja Custom</td>
                        <td>9 200 zł</td>
                        <td><span class="status-pill status-pending">Oczekiwanie</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>
