<section class="shop-catalog pt-5">
    <div class="container">
        <header class="flex-between align-center mb-3">
            <div>
                <h1 class="shop-title">Katalog <span class="text-gradient">Premium</span></h1>
                <p class="text-muted">Profesjonalnie zbudowane zestawy gotowe do działania.</p>
            </div>
            <div class="shop-filters-bar flex gap-1">
                <a href="shop.php" class="btn btn-outline <?php echo !$current_category ? 'active' : ''; ?>">Wszystkie</a>
                <a href="shop.php?category=gaming" class="btn btn-outline <?php echo $current_category === 'gaming' ? 'active' : ''; ?>">Gaming</a>
                <a href="shop.php?category=workstation" class="btn btn-outline <?php echo $current_category === 'workstation' ? 'active' : ''; ?>">Workstation</a>
            </div>
        </header>

        <div class="grid grid-3 gap-2">
            <?php foreach($products as $product): ?>
            <div class="product-card reveal">
                <div class="product-img-wrapper shine-effect">
                    <img src="<?php echo h($product['image_url']); ?>" alt="<?php echo h($product['name']); ?>">
                </div>
                <div class="product-info p-1-5">
                    <h3 class="mb-half"><?php echo h($product['name']); ?></h3>
                    <p class="text-muted fs-sm mb-1"><?php echo h($product['short_description']); ?></p>
                    <div class="flex-between align-center">
                        <span class="price-tag bold text-primary"><?php echo number_format($product['price'], 2, ',', ' '); ?> zł</span>
                        <a href="shop.php?slug=<?php echo h($product['slug']); ?>" class="btn btn-outline p-half fs-xs">Detale</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
