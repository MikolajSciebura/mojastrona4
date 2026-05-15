<?php

class ConfiguratorController extends Controller {
    private $componentModel;

    public function __construct() {
        $this->componentModel = new Component();
    }

    public function index() {
        $data = [
            'cpus' => $this->componentModel->getByType('cpu'),
            'gpus' => $this->componentModel->getByType('gpu'),
            'mobos' => $this->componentModel->getByType('mobo'),
            'rams' => $this->componentModel->getByType('ram'),
            'page_title' => 'Konfigurator PC Premium - MSTechPC'
        ];

        $this->render('shop/configurator', $data);
    }

    public function save() {
        if (!is_logged_in()) {
            $this->json(['success' => false, 'message' => 'Musisz być zalogowany']);
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $components = $input['components'] ?? [];

        if (empty($components)) {
            $this->json(['success' => false, 'message' => 'Pusta konfiguracja']);
        }

        // Logic to save configuration to database
        $userId = $_SESSION['user_id'];
        $configName = "Zestaw " . date('Y-m-d H:i');

        $stmt = Database::getInstance()->getConnection()->prepare("INSERT INTO pc_configurations (user_id, name, components_json) VALUES (?, ?, ?)");
        if ($stmt->execute([$userId, $configName, json_encode($components)])) {
            $this->json(['success' => true, 'message' => 'Konfiguracja zapisana pomyślnie!']);
        } else {
            $this->json(['success' => false, 'message' => 'Błąd zapisu']);
        }
    }
}
