<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id_product'] ?? 0);
    $qty = (int)($_POST['qty'] ?? 1);

    if ($id > 0) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;
    }

    // 👉 langsung masuk ke kategori Keranjang
    header("Location: shop.php?view=cart");
    exit;
}
