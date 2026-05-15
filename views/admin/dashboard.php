<div class="admin-layout container mt-2">
    <aside class="admin-sidebar card p-2">
        <h2 class="text-gradient mb-2">MSTech Admin</h2>
        <nav class="admin-nav">
            <a href="dashboard.php" class="admin-nav-item active">Dashboard</a>
            <a href="products.php" class="admin-nav-item">Produkty</a>
            <a href="orders.php" class="admin-nav-item">Zamówienia</a>
            <a href="users.php" class="admin-nav-item">Użytkownicy</a>
            <a href="blog.php" class="admin-nav-item">Blog</a>
            <hr class="my-1 opacity-10">
            <a href="<?php echo BASE_URL; ?>/" class="admin-nav-item">Wróć do sklepu</a>
        </nav>
    </aside>

    <div class="admin-main">
        <h1 class="mb-2">Admin <span class="text-gradient">Dashboard</span></h1>

        <div class="grid grid-3 gap-1 mb-2">
            <div class="admin-stat-card card p-2">
                <p class="text-muted fs-sm">Wszyscy Użytkownicy</p>
                <h2 class="text-white"><?php echo $stats['total_users']; ?></h2>
            </div>
            <div class="admin-stat-card card p-2">
                <p class="text-muted fs-sm">Wszystkie Produkty</p>
                <h2 class="text-white"><?php echo $stats['total_products']; ?></h2>
            </div>
            <div class="admin-stat-card card p-2">
                <p class="text-muted fs-sm">Wszystkie Zamówienia</p>
                <h2 class="text-white"><?php echo $stats['total_orders']; ?></h2>
            </div>
        </div>

        <div class="card p-2">
            <h3 class="mb-1 text-white">Najnowsze Zamówienia</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Klient</th>
                        <th>Kwota</th>
                        <th>Status</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stats['recent_orders'] as $order): ?>
                    <tr>
                        <td>#<?php echo h($order['order_number']); ?></td>
                        <td>User ID: <?php echo $order['user_id']; ?></td>
                        <td><?php echo number_format($order['total_price'], 2, ',', ' '); ?> zł</td>
                        <td><span class="status-pill status-<?php echo h($order['status']); ?>"><?php echo h($order['status']); ?></span></td>
                        <td><a href="order_view.php?id=<?php echo $order['id']; ?>" class="text-primary">Widok</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
