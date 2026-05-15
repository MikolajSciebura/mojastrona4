<?php

class AdminController extends Controller {
    private $productModel;
    private $orderModel;
    private $userModel;

    public function __construct() {
        if (!is_admin()) {
            $this->redirect('/');
        }
        $this->productModel = new Product();
        $this->orderModel = new Order();
        $this->userModel = new User();
    }

    public function dashboard() {
        $stats = [
            'total_users' => count($this->userModel->all()),
            'total_products' => count($this->productModel->all()),
            'total_orders' => count($this->orderModel->all()),
            'recent_orders' => array_slice($this->orderModel->all(), 0, 5)
        ];

        $this->render('admin/dashboard', [
            'stats' => $stats,
            'page_title' => 'Admin Dashboard - MSTechPC'
        ]);
    }

    public function products() {
        $products = $this->productModel->all();
        $this->render('admin/products', [
            'products' => $products,
            'page_title' => 'Zarządzanie Produktami'
        ]);
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle image upload and data saving
            // ... Logic for saving ...
            $this->redirect('/admin/products.php');
        }
        $this->render('admin/product_form', ['page_title' => 'Dodaj Produkt']);
    }
}
