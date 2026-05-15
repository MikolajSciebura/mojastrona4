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
            $data = [
                'name' => h($_POST['name']),
                'slug' => h($_POST['slug']),
                'price' => (float)$_POST['price'],
                'category_id' => (int)$_POST['category_id'],
                'short_description' => h($_POST['short_description']),
                'description' => $_POST['description'],
                'is_featured' => isset($_POST['is_featured']) ? 1 : 0
            ];

            // Image handling
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = time() . '_' . $data['slug'] . '.' . $ext;
                $target = BASE_PATH . '/uploads/products/' . $filename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $data['image_url'] = ASSETS_PATH . '/../uploads/products/' . $filename;
                }
            }

            if ($this->productModel->create($data)) {
                $this->redirect('/admin/products');
            }
        }
        $this->render('admin/product_form', ['page_title' => 'Dodaj Produkt']);
    }

    public function orders() {
        $orders = $this->orderModel->all();
        $this->render('admin/orders', [
            'orders' => $orders,
            'page_title' => 'Zarządzanie Zamówieniami'
        ]);
    }
}
