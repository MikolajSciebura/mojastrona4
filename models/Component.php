<?php

class Component extends Model {
    protected $table = 'components';

    public function getByType($type) {
        $stmt = $this->db->prepare("SELECT * FROM components WHERE type = ? AND stock_count > 0");
        $stmt->execute([$type]);
        return $stmt->fetchAll();
    }
}
