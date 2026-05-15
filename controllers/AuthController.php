<?php

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf_token($_POST['csrf_token'])) {
                $this->json(['success' => false, 'message' => 'Błąd CSRF']);
            }

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];

                if (isset($_POST['remember'])) {
                    $token = bin2hex(random_bytes(32));
                    setcookie('remember_me', $token, time() + (86400 * 30), "/", "", true, true);
                    // In a real app, save $token in a user_tokens table
                }

                $this->json(['success' => true, 'message' => 'Zalogowano pomyślnie']);
            } else {
                $this->json(['success' => false, 'message' => 'Błędny email lub hasło']);
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf_token($_POST['csrf_token'])) {
                $this->json(['success' => false, 'message' => 'Błąd CSRF']);
            }

            $name = h($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $confirm = $_POST['password_confirm'];

            if ($password !== $confirm) {
                $this->json(['success' => false, 'message' => 'Hasła nie są identyczne']);
            }

            if ($this->userModel->findByEmail($email)) {
                $this->json(['success' => false, 'message' => 'Użytkownik już istnieje']);
            }

            if ($this->userModel->create(['name' => $name, 'email' => $email, 'password' => $password])) {
                $this->json(['success' => true, 'message' => 'Konto utworzone']);
            } else {
                $this->json(['success' => false, 'message' => 'Błąd podczas tworzenia konta']);
            }
        }
    }

    public function logout() {
        session_destroy();
        setcookie('remember_me', '', time() - 3600, '/');
        $this->redirect('/');
    }
}
