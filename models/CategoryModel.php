<?php
// models/CategoryModel.php
require_once __DIR__ . '/../config/database.php';

class CategoryModel {
    public function all(): array {
        $stmt = db()->query('SELECT * FROM categories ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array {$stmt = db()->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        $result =$stmt->fetch();
        return $result ?: null;
    }

    public function create(string $name, ?string $description): bool {
        try {
            $stmt = db()->prepare('INSERT INTO categories (name, description) VALUES (?, ?)');
            return $stmt->execute([$name,$description]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update(int $id, string $name, ?string $description): bool {
        try {
            $stmt = db()->prepare('UPDATE categories SET name = ?, description = ? WHERE id = ?');
            return $stmt->execute([$name, $description,$id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete(int $id): bool {$stmt = db()->prepare('DELETE FROM categories WHERE id = ?');
        return $stmt->execute([$id]);
    }
}