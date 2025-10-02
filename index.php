<?php
require_once "Database.php";
require_once "buku.php";

// koneksi
$database = new Database();
$db = $database->getConnection();

// objek buku
$buku = new Buku($db);

// CREATE
$buku->judul = "Belajar PDO CRUD";
$buku->penulis = "John Doe";
$buku->harga = 99000;
$buku->stok = 15;
$buku->create();
echo "Data buku baru berhasil ditambahkan.<br>";

// READ ALL
echo "<h3>Daftar Buku:</h3>";
$stmt = $buku->readAll();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['id_buku']." - ".$row['judul']." - ".$row['penulis']." - Rp".$row['harga']." - Stok: ".$row['stok']."<br>";
}

// READ ONE
$buku->id_buku = 121; // contoh ambil buku dengan id 121
$detail = $buku->readOne();
echo "<h3>Detail Buku ID 121:</h3>";
print_r($detail);

// UPDATE
$buku->id_buku = 121;
$buku->judul = "Mamamia Lezatos (Revisi)";
$buku->penulis = "Michael Santosa";
$buku->harga = 1500000;
$buku->stok = 5;
$buku->update();
echo "<br>Buku ID 121 berhasil diupdate.<br>";

// DELETE
$buku->id_buku = 190; // contoh hapus buku dengan id 190
$buku->delete();
echo "Buku ID 190 berhasil dihapus.<br>";
?>
