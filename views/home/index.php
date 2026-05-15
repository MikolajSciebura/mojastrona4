<section class="hero">
    <div class="container hero-content">
        <h1 class="hero-title reveal">Zdefiniuj Swoją <span class="text-gradient">Wydajność</span></h1>
        <p class="hero-description reveal">
            MSTechPC to pasja do technologii i dbałość o każdy detal.
            Budujemy potężne stacje robocze i gamingowe bestie dopasowane do Twoich potrzeb w Częstochowie i Kłobucku.
        </p>
        <div class="hero-btns reveal">
            <a href="<?php echo BASE_URL; ?>/shop.php" class="btn btn-primary">Przeglądaj Sklep</a>
            <a href="<?php echo BASE_URL; ?>/configurator.php" class="btn btn-outline">Konfigurator PC</a>
        </div>
    </div>
</section>

<section class="stats">
    <div class="container grid grid-4 text-center">
        <div class="stat-item reveal">
            <h3 class="text-gradient">500+</h3>
            <p>Złożonych PC</p>
        </div>
        <div class="stat-item reveal">
            <h3 class="text-gradient">100%</h3>
            <p>Zadowolonych Klientów</p>
        </div>
        <div class="stat-item reveal">
            <h3 class="text-gradient">24h</h3>
            <p>Czas Reakcji Serwisu</p>
        </div>
        <div class="stat-item reveal">
            <h3 class="text-gradient">3 lata</h3>
            <p>Gwarancji Premium</p>
        </div>
    </div>
</section>

<section id="featured-products">
    <div class="container">
        <div class="section-header reveal text-center">
            <h2>Najchętniej Wybierane <span class="text-gradient">Bestsellery</span></h2>
            <p class="text-muted">Sprawdź nasze najpopularniejsze konfiguracje gamingowe.</p>
        </div>

        <div class="grid grid-3">
            <?php foreach($featured as $product): ?>
            <div class="product-card reveal">
                <img src="<?php echo h($product['image_url']); ?>" alt="<?php echo h($product['name']); ?>" class="product-image">
                <div class="product-info">
                    <span class="product-category">Gaming Elite</span>
                    <h3 class="product-title"><?php echo h($product['name']); ?></h3>
                    <div class="product-price"><?php echo number_format($product['price'], 2, ',', ' '); ?> zł</div>
                    <a href="<?php echo BASE_URL; ?>/shop.php?slug=<?php echo h($product['slug']); ?>" class="btn btn-primary w-100 mt-1">Sprawdź detale</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="why-us">
    <div class="container grid grid-2 gap-2 align-center">
        <div class="why-us-content reveal">
            <h2>Dlaczego <span class="text-gradient">MSTechPC Częstochowa?</span></h2>
            <p class="mb-2">Jesteśmy lokalnym liderem w budowie komputerów na zamówienie. Obsługujemy klientów z regionu, dostarczając sprzęt najwyższej klasy.</p>
            <ul class="feature-list">
                <li class="feature-item">
                    <span class="feature-icon">✓</span>
                    <div class="feature-text">
                        <strong class="text-white">Indywidualne podejście</strong>
                        <p>Nie tylko składamy, ale doradzamy co będzie najlepsze dla Twoich potrzeb.</p>
                    </div>
                </li>
                <li class="feature-item">
                    <span class="feature-icon">✓</span>
                    <div class="feature-text">
                        <strong class="text-white">Lokalny serwis</strong>
                        <p>Błyskawiczna pomoc techniczna bez wysyłania sprzętu na drugi koniec Polski.</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="reveal shine-effect hero-image-container">
            <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&q=80&w=800" alt="MSTechPC Workshop">
        </div>
    </div>
</section>
