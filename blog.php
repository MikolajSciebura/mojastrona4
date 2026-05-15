<?php
require_once 'includes/header.php';
require_once 'config/db.php';

$db = Database::getInstance()->getConnection();

// Real blog posts
$posts = [
    [
        'title' => 'Jaki komputer gamingowy kupić w 2026 roku?',
        'meta' => 'Poradnik • 24.05.2026',
        'excerpt' => 'Szukasz idealnej maszyny do gier? Analizujemy rynek procesorów Intel 15. generacji oraz kart RTX 5000.',
        'image' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&q=80&w=600'
    ],
    [
        'title' => 'RTX 5070 vs RTX 5080 - Co wybrać do 4K?',
        'meta' => 'Hardware • 15.05.2026',
        'excerpt' => 'Porównanie wydajności w najnowszych tytułach takich jak GTA VI. Zobacz, która karta oferuje lepszy Ray Tracing.',
        'image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=600'
    ],
    [
        'title' => 'Jak przyspieszyć komputer? 5 sprawdzonych sposobów',
        'meta' => 'Serwis • 10.05.2026',
        'excerpt' => 'Twój PC zwolnił? Dowiedz się jak przeprowadzić profesjonalną konserwację systemu i sprzętu w MSTechPC.',
        'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=600'
    ]
];
?>

<main>
    <section class="blog-header">
        <div class="container">
            <h1 class="shop-title">Blog <span class="text-gradient">Technologiczny</span></h1>
            <p class="shop-subtitle">Poradniki, testy i najnowsze informacje ze świata IT z regionu Częstochowy.</p>

            <div class="grid grid-3">
                <?php foreach($posts as $post): ?>
                <article class="blog-post-card reveal">
                    <img src="<?php echo $post['image']; ?>" alt="Blog" class="blog-post-img">
                    <span class="blog-post-meta"><?php echo $post['meta']; ?></span>
                    <h2 class="blog-post-title text-white"><?php echo $post['title']; ?></h2>
                    <p class="blog-post-excerpt"><?php echo $post['excerpt']; ?></p>
                    <a href="#" class="btn btn-outline w-100">Czytaj więcej</a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
