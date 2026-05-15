<?php

class HomeController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $featured = $this->productModel->getFeatured();

        $this->render('home/index', [
            'featured' => $featured,
            'page_title' => 'MSTechPC - Komputery Gamingowe Częstochowa'
        ]);
    }

    public function kontakt() {
        $this->render('home/kontakt', [
            'page_title' => 'Kontakt - MSTechPC Częstochowa'
        ]);
    }

    public function serwis() {
        $this->render('home/serwis', [
            'page_title' => 'Serwis Komputerowy Częstochowa | MSTechPC'
        ]);
    }
}
