<?php
class Product
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all(string $keyword = ''): array
    {
        if ($keyword !== '') {
            $stmt = $this->db->prepare(
                'SELECT * FROM products WHERE name LIKE :k OR category LIKE :k ORDER BY id DESC'
            );
            $stmt->execute(['k' => "%$keyword%"]);
        } else {
            $stmt = $this->db->query('SELECT * FROM products ORDER BY id DESC');
        }
        return $stmt->fetchAll();
    }

    public function find(int $id)
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $d): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO products (name, category, price, stock, description)
             VALUES (:name, :category, :price, :stock, :description)'
        );
        return $stmt->execute($d);
    }

    public function update(int $id, array $d): bool
    {
        $d['id'] = $id;
        $stmt = $this->db->prepare(
            'UPDATE products SET name=:name, category=:category, price=:price,
             stock=:stock, description=:description WHERE id=:id'
        );
        return $stmt->execute($d);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function stats(): array
    {
        $row = $this->db->query(
            'SELECT COUNT(*) AS total, COALESCE(SUM(stock),0) AS total_stock,
                    COUNT(DISTINCT category) AS categories,
                    COALESCE(SUM(price*stock),0) AS asset
             FROM products'
        )->fetch();
        return $row;
    }
}
