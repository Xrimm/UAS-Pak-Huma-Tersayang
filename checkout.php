<?php
session_start();
require_once "koneksi_database.php";
require_once "data/product.php";
require_once "cart_count.php";

// Ambil semua produk dari database
$allProducts = getAllProductsWithChild($conn);

// Ambil keranjang
$cart = $_SESSION['cart'] ?? [];
$cartProducts = getCartProducts($allProducts, $cart);
$totalHarga = getCartTotal($cartProducts, $cart);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout - Casholle</title>
        <link rel="stylesheet" href="css_assets/header.css">
        <link rel="stylesheet" href="css_assets/checkout.css">
        <link rel="stylesheet" href="css_assets/footer.css">
    </head>

    <body>
        <?php include 'header.php'; ?>

        <div class="checkout-container">
            <h2>Checkout</h2>

            <?php if(empty($cartProducts)): ?>
                <p>Keranjang kosong.</p>
            <?php else: ?>
                <?php foreach($cartProducts as $p): 
                    $qty = $cart[$p['id_product']] ?? 0;
                    $subtotal = $p['price'] * $qty;
                ?>
                    <div class="checkout-item">
                        <span><?= htmlspecialchars($p['product_type'] === 'Card' ? ($p['cards'][0]['nama_card'] ?? 'Card') : ($p['starter_deck']['nama_starter'] ?? 'Deck')) ?></span>
                        <span><?= $qty ?> × ¥<?= number_format($p['price']) ?> = ¥<?= number_format($subtotal) ?></span>
                    </div>
                <?php endforeach; ?>

                <div class="checkout-total">
                    Total: ¥<?= number_format($totalHarga) ?>
                </div>

                <form method="post" action="checkout_done.php">
                    <button type="submit" class="btn-pay">Saya sudah membayar</button>
                </form>
            <?php endif; ?>
        </div>

        <?php include 'footer.php'; ?>

    </body>
</html>