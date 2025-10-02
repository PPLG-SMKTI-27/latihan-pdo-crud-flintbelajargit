<?php
class Buku {
    private $conn;
    private $table = "buku";

    public $id_buku;
    public $judul;
    public $penulis;
    public $harga;
    public $stok;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $sql = "INSERT INTO " . $this->table . " (judul, penulis, harga, stok) 
                VALUES (:judul, :penulis, :harga, :stok)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':judul'   => $this->judul,
            ':penulis' => $this->penulis,
            ':harga'   => $this->harga,
            ':stok'    => $this->stok
        ]);
    }

    // Read (semua buku)
    public function readAll() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($sql);
        return $stmt;
    }

    // Read (satu buku)
    public function readOne() {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_buku = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $this->id_buku]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update() {
        $sql = "UPDATE " . $this->table . " 
                SET judul = :judul, penulis = :penulis, harga = :harga, stok = :stok 
                WHERE id_buku = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':judul'   => $this->judul,
            ':penulis' => $this->penulis,
            ':harga'   => $this->harga,
            ':stok'    => $this->stok,
            ':id'      => $this->id_buku
        ]);
    }

    // Delete
    public function delete() {
        $sql = "DELETE FROM " . $this->table . " WHERE id_buku = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $this->id_buku]);
    }
}
?>
