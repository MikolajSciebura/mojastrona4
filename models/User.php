<?php

class User extends Model {
    protected $table = 'users';

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function create($data) {
        $hashed = password_hash($data['password'], PASSWORD_ARGON2ID);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $hashed,
            $data['role'] ?? 'customer'
        ]);
    }

    public function update($id, $data) {
        $fields = [];
        $values = [];
        foreach ($data as $key => $value) {
            if ($key === 'password') {
                $fields[] = "password = ?";
                $values[] = password_hash($value, PASSWORD_ARGON2ID);
            } else {
                $fields[] = "$key = ?";
                $values[] = $value;
            }
        }
        $values[] = $id;
        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);
    }

    public function saveRememberToken($userId, $token) {
        $hashedToken = hash('sha256', $token);
        $expires = date('Y-m-d H:i:s', time() + 86400 * 30);

        // We need a user_tokens table or just a column in users
        // Let's use a simple column for this demo/production-ready-skeleton
        $stmt = $this->db->prepare("UPDATE users SET remember_token = ?, token_expires = ? WHERE id = ?");
        return $stmt->execute([$hashedToken, $expires, $userId]);
    }
}
