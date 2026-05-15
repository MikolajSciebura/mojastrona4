<?php

class BlogController extends Controller {
    private $blogModel;

    public function __construct() {
        // Assume a BlogModel exists
    }

    public function index() {
        $posts = [
            [
                'title' => 'Jaki komputer gamingowy kupić w 2026 roku?',
                'slug' => 'jaki-komputer-gamingowy-2026',
                'meta' => 'Poradnik • 24.05.2026',
                'excerpt' => 'Szukasz idealnej maszyny do gier? Analizujemy rynek procesorów Intel 15. generacji oraz kart RTX 5000.',
                'image' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&q=80&w=600'
            ],
            [
                'title' => 'RTX 5070 vs RTX 5080 - Co wybrać do 4K?',
                'slug' => 'rtx-5070-vs-5080',
                'meta' => 'Hardware • 15.05.2026',
                'excerpt' => 'Porównanie wydajności w najnowszych tytułach takich jak GTA VI. Zobacz, która karta oferuje lepszy Ray Tracing.',
                'image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=600'
            ]
        ];

        $this->render('blog/index', [
            'posts' => $posts,
            'page_title' => 'Blog Technologiczny - MSTechPC Częstochowa'
        ]);
    }
}
