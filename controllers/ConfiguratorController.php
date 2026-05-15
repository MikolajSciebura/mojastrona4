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
        // Save logic to pc_configurations table
        $this->json(['success' => true, 'message' => 'Konfiguracja zapisana']);
    }
}
