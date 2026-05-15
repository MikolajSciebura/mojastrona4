<?php

class AccountController extends Controller {
    private $userModel;
    private $orderModel;

    public function __construct() {
        if (!is_logged_in()) {
            $this->redirect('/account/login.php');
        }
        $this->userModel = new User();
        $this->orderModel = new Order();
    }

    public function index() {
        $user = $this->userModel->find($_SESSION['user_id']);
        $orders = $this->orderModel->findByUserId($_SESSION['user_id']);

        $this->render('account/dashboard', [
            'user' => $user,
            'orders' => $orders,
            'page_title' => 'Panel Klienta - MSTechPC'
        ]);
    }

    public function orders() {
        $orders = $this->orderModel->findByUserId($_SESSION['user_id']);
        $this->render('account/orders', [
            'orders' => $orders,
            'page_title' => 'Moje Zamówienia'
        ]);
    }

    public function profile() {
        $user = $this->userModel->find($_SESSION['user_id']);
        $this->render('account/profile', [
            'user' => $user,
            'page_title' => 'Edycja Profilu'
        ]);
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf_token($_POST['csrf_token'])) {
                $this->redirect('/account/profile.php?error=csrf');
            }

            $data = [
                'name' => h($_POST['name']),
                'phone' => h($_POST['phone']),
                'address' => h($_POST['address'])
            ];

            if (!empty($_POST['new_password'])) {
                $data['password'] = $_POST['new_password'];
            }

            $this->userModel->update($_SESSION['user_id'], $data);
            $this->redirect('/account/profile.php?success=1');
        }
    }
}
