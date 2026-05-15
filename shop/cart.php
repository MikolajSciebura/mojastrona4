<?php
require_once '../includes/header.php';
?>

<main>
    <section class="shop-catalog">
        <div class="container">
            <h1 class="shop-title mb-2">Twój <span class="text-gradient">Koszyk</span></h1>

            <div class="card reveal">
                <div class="cart-empty text-center p-2">
                    <svg width="64" height="64" fill="none" stroke="var(--text-muted)" stroke-width="1" viewBox="0 0 24 24" class="mb-1"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                    <h3 class="text-white">Twój koszyk jest pusty</h3>
                    <p class="text-muted mb-2">Wygląda na to, że nie dodałeś jeszcze żadnego produktu.</p>
                    <a href="/shop.php" class="btn btn-primary">Wróć do sklepu</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once '../includes/footer.php'; ?>
