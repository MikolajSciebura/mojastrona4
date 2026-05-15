<?php

class Auth {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($name, $email, $password) {
        // Check if user exists
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return false;
        }

        $hashed_password = password_hash($password, PASSWORD_ARGON2ID);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hashed_password]);
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['name'];
            return $user;
        }
        return false;
    }

    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public static function isAdmin() {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);
    }

    public function getCurrentUser() {
        if (!self::isLoggedIn()) return null;
        $stmt = $this->db->prepare("SELECT id, email, name, role FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch();
    }
}
