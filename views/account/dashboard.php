<div class="account-layout container mt-2">
    <aside class="account-sidebar card p-2">
        <div class="user-brief mb-2">
            <h3 class="text-white"><?php echo h($user['name']); ?></h3>
            <p class="text-muted fs-sm"><?php echo h($user['email']); ?></p>
        </div>
        <nav class="account-nav">
            <a href="dashboard.php" class="account-nav-item active">Dashboard</a>
            <a href="orders.php" class="account-nav-item">Zamówienia</a>
            <a href="wishlist.php" class="account-nav-item">Wishlista</a>
            <a href="profile.php" class="account-nav-item">Ustawienia Konta</a>
            <hr class="my-1 opacity-10">
            <a href="<?php echo BASE_URL; ?>/api/auth.php?action=logout" class="account-nav-item text-danger">Wyloguj się</a>
        </nav>
    </aside>

    <div class="account-main">
        <h1 class="mb-2">Witaj ponownie, <span class="text-gradient"><?php echo explode(' ', h($user['name']))[0]; ?></span></h1>

        <div class="grid grid-3 gap-1 mb-2">
            <div class="card p-2 text-center">
                <span class="text-muted fs-sm">Wszystkie zamówienia</span>
                <h2 class="text-white"><?php echo count($orders); ?></h2>
            </div>
            <div class="card p-2 text-center">
                <span class="text-muted fs-sm">Status ostatniego</span>
                <h2 class="text-primary"><?php echo !empty($orders) ? h($orders[0]['status']) : 'Brak'; ?></h2>
            </div>
            <div class="card p-2 text-center">
                <span class="text-muted fs-sm">Twoja wishlista</span>
                <h2 class="text-secondary">0</h2>
            </div>
        </div>

        <div class="card p-2">
            <h3 class="mb-1 text-white">Ostatnie Zamówienie</h3>
            <?php if (!empty($orders)): ?>
                <div class="order-summary-box p-1 border-glass rounded-lg">
                    <div class="flex-between">
                        <div>
                            <strong>#<?php echo h($orders[0]['order_number']); ?></strong>
                            <p class="text-muted fs-xs"><?php echo date('d.m.Y H:i', strtotime($orders[0]['created_at'])); ?></p>
                        </div>
                        <div class="text-right">
                            <span class="status-pill status-<?php echo h($orders[0]['status']); ?>"><?php echo h($orders[0]['status']); ?></span>
                            <p class="bold mt-half"><?php echo number_format($orders[0]['total_price'], 2, ',', ' '); ?> zł</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-muted">Nie masz jeszcze żadnych zamówień.</p>
                <a href="<?php echo BASE_URL; ?>/shop.php" class="btn btn-primary mt-1">Przejdź do sklepu</a>
            <?php endif; ?>
        </div>
    </div>
</div>
