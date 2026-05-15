<?php

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        $viewFile = BASE_PATH . '/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            require_once BASE_PATH . '/includes/header.php';
            require_once $viewFile;
            require_once BASE_PATH . '/includes/footer.php';
        } else {
            die("View $view not found.");
        }
    }

    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function redirect($url) {
        header("Location: " . BASE_URL . $url);
        exit;
    }
}
