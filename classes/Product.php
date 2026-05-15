<?php

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll($limit = 12, $offset = 0) {
        $stmt = $this->db->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByCategory($category_slug, $limit = 12) {
        $stmt = $this->db->prepare("SELECT p.* FROM products p JOIN categories c ON p.category_id = c.id WHERE c.slug = :slug LIMIT :limit");
        $stmt->bindValue(':slug', $category_slug, PDO::PARAM_STR);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBySlug($slug) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }

    public function getFeatured() {
        $stmt = $this->db->query("SELECT * FROM products WHERE is_featured = 1 LIMIT 8");
        return $stmt->fetchAll();
    }

    public function search($query) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE name LIKE ? OR short_description LIKE ?");
        $searchTerm = "%$query%";
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll();
    }
}
