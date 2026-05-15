<div class="account-layout container pt-5 mt-2">
    <aside class="account-sidebar card p-2 reveal">
        <div class="user-brief mb-2 text-center">
            <div class="avatar-placeholder mb-1 mx-auto">
                <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
            </div>
            <h3 class="text-white"><?php echo h($user['name']); ?></h3>
            <p class="text-muted fs-xs"><?php echo h($user['email']); ?></p>
        </div>

        <nav class="account-nav">
            <a href="dashboard.php" class="account-nav-item active">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
            <a href="orders.php" class="account-nav-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4H6z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                Moje Zamówienia
            </a>
            <a href="wishlist.php" class="account-nav-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                Wishlista
            </a>
            <a href="profile.php" class="account-nav-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Profil
            </a>
            <hr class="my-1 border-glass">
            <a href="<?php echo BASE_URL; ?>/api/auth.php?action=logout" class="account-nav-item text-danger">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Wyloguj się
            </a>
        </nav>
    </aside>

    <div class="account-main">
        <header class="mb-3 reveal">
            <h1 class="mb-half">Cześć, <span class="text-gradient"><?php echo h(explode(' ', $user['name'])[0]); ?></span>!</h1>
            <p class="text-muted">Zarządzaj swoimi zamówieniami i konfiguracjami.</p>
        </header>

        <div class="grid grid-3 gap-1-5 mb-3 reveal">
            <div class="card p-2 stats-card">
                <span class="text-muted fs-xs text-uppercase tracking-wider">Zamówienia</span>
                <h2 class="mt-half"><?php echo count($orders); ?></h2>
            </div>
            <div class="card p-2 stats-card">
                <span class="text-muted fs-xs text-uppercase tracking-wider">Ostatni status</span>
                <h3 class="mt-half text-primary"><?php echo !empty($orders) ? h($orders[0]['status']) : 'Brak'; ?></h3>
            </div>
            <div class="card p-2 stats-card">
                <span class="text-muted fs-xs text-uppercase tracking-wider">Wishlista</span>
                <h2 class="mt-half">0</h2>
            </div>
        </div>

        <div class="card p-2 reveal">
            <div class="flex-between align-center mb-2">
                <h3 class="text-white">Ostatnie Zamówienie</h3>
                <a href="orders.php" class="fs-sm text-primary">Zobacz wszystkie</a>
            </div>

            <?php if (!empty($orders)): ?>
                <div class="order-list-item p-1-5 border-glass rounded-lg">
                    <div class="flex-between align-center">
                        <div>
                            <span class="fs-xs text-muted">Zamówienie #<?php echo h($orders[0]['order_number']); ?></span>
                            <h4 class="mt-half"><?php echo number_format($orders[0]['total_price'], 2, ',', ' '); ?> zł</h4>
                            <p class="fs-xs text-muted mt-half"><?php echo date('d.m.Y', strtotime($orders[0]['created_at'])); ?></p>
                        </div>
                        <div>
                            <span class="status-pill status-<?php echo h($orders[0]['status']); ?>"><?php echo h($orders[0]['status']); ?></span>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center p-3">
                    <p class="text-muted mb-2">Nie masz jeszcze żadnych zamówień.</p>
                    <a href="<?php echo BASE_URL; ?>/shop.php" class="btn btn-primary">Zacznij zakupy</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
