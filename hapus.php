<?php
session_start(); // Memulai sesi PHP untuk menggunakan variabel session

include "koneksi.php"; // Menyertakan file koneksi.php yang berisi kode untuk menghubungkan ke database
// Mengecek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Mengambil ID barang dari parameter URL
    // Menyusun query SQL untuk menghapus data barang dari tabel 'barang' berdasarkan ID
    $sql = "DELETE FROM barang WHERE id_barang = $id";
    // Menjalankan query SQL pada database
    $query = mysqli_query($db, $sql);
    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, set pesan sukses dalam session dan arahkan ke halaman lihat.php
        $_SESSION['pesan'] = "Berhasil menghapus barang";
        header("Location: lihat.php"); // Arahkan pengguna ke halaman lihat.php
        exit(); // Hentikan eksekusi script setelah redirect
    } else {
        // Jika gagal, tampilkan pesan error dan hentikan eksekusi script
        die("Gagal menghapus barang: " . mysqli_error($db));
    }
}
