<?php
session_start();

// Memastikan hanya POST request yang bisa menghapus
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil ID produk, pastikan integer
    $id_product = isset($_POST['id_product']) ? (int) $_POST['id_product'] : 0;

    // Hapus produk dari cart jika ada
    if ($id_product > 0 && isset($_SESSION['cart'][$id_product])) {
        unset($_SESSION['cart'][$id_product]);
    }

    // Redirect kembali ke kategori Keranjang
    header("Location: shop.php?view=cart");
    exit;
}
    