<?php
require_once 'includes/header.php';
require_once 'classes/Product.php';
require_once 'config/db.php';

$db = Database::getInstance()->getConnection();
$productModel = new Product($db);

// Simple category mapping for demo
$category = $_GET['category'] ?? null;
$products = $productModel->getAll();

if ($category) {
    // In a real app, this would be a filtered query.
    // For demo, we just simulate filtering.
}
?>

<main>
    <section class="shop-header">
        <div class="container">
            <h1 class="shop-title">Katalog <span class="text-gradient">Premium</span></h1>
            <p class="shop-subtitle">Wybierz sprzęt, który sprosta Twoim wymaganiom.</p>

            <div class="shop-controls">
                <div class="shop-filters">
                    <a href="shop.php" class="btn btn-outline <?php echo !$category ? 'active' : ''; ?>">Wszystkie</a>
                    <a href="shop.php?category=gaming" class="btn btn-outline <?php echo $category == 'gaming' ? 'active' : ''; ?>">Gaming</a>
                    <a href="shop.php?category=workstation" class="btn btn-outline <?php echo $category == 'workstation' ? 'active' : ''; ?>">Workstation</a>
                    <a href="shop.php?category=streaming" class="btn btn-outline <?php echo $category == 'streaming' ? 'active' : ''; ?>">Streaming</a>
                    <a href="shop.php?category=office" class="btn btn-outline <?php echo $category == 'office' ? 'active' : ''; ?>">Office</a>
                </div>
                <div class="search-box">
                    <input type="text" class="form-input" placeholder="Szukaj produktu...">
                    <svg class="search-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                </div>
            </div>

            <div class="grid grid-4" id="product-grid">
                <?php foreach($products as $product): ?>
                <div class="product-card reveal">
                    <img src="<?php echo $product['image_url'] ?: 'assets/img/pc1.jpg'; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <div class="product-info">
                        <span class="product-category"><?php echo $product['category_name'] ?: 'Desktop'; ?></span>
                        <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <div class="product-price"><?php echo number_format($product['price'], 2, ',', ' '); ?> zł</div>
                        <div class="product-actions">
                            <button class="btn btn-primary w-100 btn-add-to-cart"
                                    data-id="<?php echo $product['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                    data-price="<?php echo $product['price']; ?>">
                                Kup teraz
                            </button>
                            <button class="btn btn-outline"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="pagination">
                <button class="btn btn-outline active">1</button>
                <button class="btn btn-outline">2</button>
                <button class="btn btn-outline">3</button>
                <button class="btn btn-outline">»</button>
            </div>
        </div>
    </section>
</main>

<script src="assets/js/shop.js" defer></script>
<?php require_once 'includes/footer.php'; ?>
