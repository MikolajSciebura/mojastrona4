<nav class="navbar">
    <div class="container">
        <a href="<?php echo BASE_URL; ?>/" class="logo">
            MS<span class="text-gradient">TechPC</span>
        </a>

        <ul class="nav-links">
            <li><a href="<?php echo BASE_URL; ?>/" class="active">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/shop.php">Sklep</a></li>
            <li><a href="<?php echo BASE_URL; ?>/configurator.php">Konfigurator</a></li>
            <li><a href="<?php echo BASE_URL; ?>/serwis.php">Serwis IT</a></li>
            <li><a href="<?php echo BASE_URL; ?>/blog.php">Blog</a></li>
            <li><a href="<?php echo BASE_URL; ?>/kontakt.php">Kontakt</a></li>
        </ul>

        <div class="nav-actions">
            <a href="<?php echo BASE_URL; ?>/account/login.php" title="Moje Konto">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </a>
            <a href="<?php echo BASE_URL; ?>/shop/cart.php" class="cart-btn" title="Koszyk">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4H6z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                <span class="cart-count">0</span>
            </a>
            <button class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>
