<section class="blog-index pt-5">
    <div class="container">
        <header class="text-center mb-4">
            <h1 class="shop-title">Wiedza <span class="text-gradient">& Hardware</span></h1>
            <p class="text-muted">Najnowsze testy, porównania i poradniki ze świata IT.</p>
        </header>

        <div class="grid grid-3 gap-2">
            <?php foreach($posts as $post): ?>
            <article class="blog-post-card card reveal">
                <div class="blog-img-wrapper overflow-hidden rounded-lg">
                    <img src="<?php echo $post['image']; ?>" class="w-100 d-block" alt="<?php echo h($post['title']); ?>">
                </div>
                <div class="p-1-5">
                    <span class="fs-xs text-primary mb-half d-block"><?php echo h($post['meta']); ?></span>
                    <h3 class="mb-1 fs-lg"><?php echo h($post['title']); ?></h3>
                    <p class="text-muted fs-sm mb-1-5"><?php echo h($post['excerpt']); ?></p>
                    <a href="blog.php?slug=<?php echo h($post['slug']); ?>" class="btn btn-outline w-100">Czytaj Artykuł</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
