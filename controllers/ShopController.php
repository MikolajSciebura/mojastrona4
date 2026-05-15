<?php

class ShopController extends Controller {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $category = $_GET['category'] ?? null;
        if ($category) {
            $products = $this->productModel->getByCategory($category);
        } else {
            $products = $this->productModel->all();
        }

        $this->render('shop/catalog', [
            'products' => $products,
            'current_category' => $category,
            'page_title' => 'Sklep Premium - MSTechPC'
        ]);
    }

    public function product() {
        $slug = $_GET['slug'] ?? '';
        $product = $this->productModel->getBySlug($slug);

        if (!$product) {
            $this->redirect('/shop.php');
        }

        $this->render('shop/product_detail', [
            'product' => $product,
            'page_title' => h($product['name']) . ' - MSTechPC'
        ]);
    }

    public function cart() {
        $this->render('shop/cart', [
            'page_title' => 'Mój Koszyk'
        ]);
    }

    public function checkout() {
        if (!is_logged_in()) {
            $this->redirect('/account/login.php?redirect=checkout');
        }
        $this->render('shop/checkout', [
            'page_title' => 'Finalizacja Zamówienia'
        ]);
    }
}
