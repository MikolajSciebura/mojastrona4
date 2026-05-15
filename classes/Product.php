<?php

class Product extends Model {
    protected $table = 'products';

    public function getAll($limit = 12, $offset = 0) {
        if (!$this->db) return [];
        $stmt = $this->db->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByCategory($category_slug, $limit = 12) {
        if (!$this->db) return [];
        $stmt = $this->db->prepare("SELECT p.* FROM products p JOIN categories c ON p.category_id = c.id WHERE c.slug = :slug LIMIT :limit");
        $stmt->bindValue(':slug', $category_slug, PDO::PARAM_STR);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBySlug($slug) {
        if (!$this->db) return null;
        $stmt = $this->db->prepare("SELECT * FROM products WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }

    public function getFeatured() {
        if (!$this->db) return [];
        $stmt = $this->db->query("SELECT * FROM products WHERE is_featured = 1 LIMIT 8");
        return $stmt->fetchAll();
    }

    public function search($query) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE name LIKE ? OR short_description LIKE ?");
        $searchTerm = "%$query%";
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll();
    }

    public function create($data) {
        if (!$this->db) return false;
        $sql = "INSERT INTO products (name, slug, price, category_id, short_description, description, image_url, is_featured)
                VALUES (:name, :slug, :price, :category_id, :short_description, :description, :image_url, :is_featured)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':slug' => $data['slug'],
            ':price' => $data['price'],
            ':category_id' => $data['category_id'],
            ':short_description' => $data['short_description'],
            ':description' => $data['description'],
            ':image_url' => $data['image_url'] ?? '',
            ':is_featured' => $data['is_featured']
        ]);
    }
}
