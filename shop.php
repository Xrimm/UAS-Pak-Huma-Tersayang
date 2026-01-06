<?php 
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "koneksi_database.php";
require_once "data/product.php";
require_once "data/kategori_shop.php";

$cart = $_SESSION['cart'] ?? [];
$viewCart = ($_GET['view'] ?? '') === 'cart';
$cartProductIds = array_keys($cart);

if ($viewCart) {
    $cartProductIds = array_keys($cart);

    $filteredProducts = array_filter($allProducts, function ($p) use ($cartProductIds) {
        return in_array($p['id_product'], $cartProductIds);
    });
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Casholle</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="css_assets/header.css">
        <link rel="stylesheet" href="css_assets/shop.css">
        <link rel="stylesheet" href="css_assets/footer.css">
    </head>

    <body>
        <?php include 'header.php'; ?>

        <h1 class="shop-title">Catalogue</h1>

        <div class="shop-layout"> <!-- 🔥 PENTING -->

            <aside class="sidebar">
                <ul class="category-list">
                    <li class="has-sub cart-menu <?= $viewCart ? 'active' : '' ?>">
                        <a href="shop.php?view=cart">
                            <span class="label">Keranjang</span>
                            <span class="arrow">▶</span>
                        </a>

                        <div class="mega-menu cart-menu-panel">
                            <div class="menu-col">
                                <?php if (empty($cart)): ?>
                                    <p>Keranjang masih kosong</p>
                                <?php else: ?>
                                    <p><?= array_sum($cart) ?> item dipilih</p>
                                    <a href="checkout.php" class="checkout-btn">
                                        Checkout
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>

                    <!-- Kategori All -->
                    <li>
                        <a href="shop.php">All</a>
                    </li>
                    
                    <?php foreach ($categories as $type => $subCategories): ?>
                        <li class="<?= !empty($subCategories) ? 'has-sub' : '' ?>">
                            <a href="shop.php?type=<?= urlencode($type) ?>">
                                <?= htmlspecialchars($type) ?>
                            </a>

                            <?php if (!empty($subCategories)): ?>
                                <span class="arrow">▶</span>
                            <?php endif; ?>

                            <?php if (!empty($subCategories)): ?>
                                <div class="mega-menu">
                                    <?php foreach ($subCategories as $cardsetName => $items): ?>
                                        <div class="menu-col">
                                            <h4><?= htmlspecialchars($cardsetName) ?></h4>

                                            <?php foreach ($items as $item): ?>
                                                <a href="shop.php?type=<?= urlencode($type) ?>&cardset=<?= urlencode($item['id_cardset']) ?>">
                                                    <?= htmlspecialchars($item['nama_cardset']) ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </aside>

            <main class="shop-content">
                <div class="shop-grid">

                    <?php foreach ($filteredProducts as $p): ?>
                        <div class="shop-card">
                                <?php if ($p['product_type'] === 'Card'): ?>
                                    <?php $firstCard = $p['cards'][0] ?? null; ?>
                                    <?php if ($firstCard): ?>
                                        <img src="<?= $firstCard['gambar_card'] ?? 'default-card.png'; ?>" 
                                            alt="<?= htmlspecialchars($firstCard['nama_card']); ?>">
                                        <h3><?= htmlspecialchars($firstCard['nama_card']); ?></h3>
                                    <?php endif; ?>

                                <?php elseif ($p['product_type'] === 'Starter Deck'): ?>
                                    <?php if ($p['starter_deck']): ?>
                                        <img src="<?= $p['starter_deck']['gambar_deck'] ?? 'default-deck.png'; ?>" 
                                            alt="<?= htmlspecialchars($p['starter_deck']['nama_starter']); ?>">
                                        <h3><?= htmlspecialchars($p['starter_deck']['nama_starter']); ?></h3>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <p class="price">
                                    ¥<?= number_format($p['price']); ?>
                                </p>

                                <?php if ($p['jumlah_tersedia'] > 0): ?>
                                    <p class="stock in-stock">
                                        ✔ Stok tersedia (<?= $p['jumlah_tersedia']; ?>)
                                    </p>
                                <?php else: ?>
                                <p class="stock out-stock">
                                    ✖ Stok habis
                                </p>
                            <?php endif; ?>

                            <div class="cart-action">
                                <?php if ($viewCart): ?>
                                    <!-- MODE KERANJANG -->

                                    <p>Jumlah: <?= $cart[$p['id_product']] ?></p>

                                    <form action="cart_remove.php" method="post">
                                        <input type="hidden" name="id_product" value="<?= $p['id_product']; ?>">
                                        <button type="submit" class="btn-cart remove">
                                            ❌ Hapus
                                        </button>
                                    </form>

                                <?php else: ?>
                                    

                                    <?php if ($p['jumlah_tersedia'] > 0): ?>
                                        <form action="cart.php" method="post">
                                            <input type="hidden" name="id_product" value="<?= $p['id_product']; ?>">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="btn-cart">
                                                🛒 Keranjang
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <button class="btn-cart disabled" disabled>
                                            Stok Habis
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        
        </div> <!-- 🔥 END shop-layout -->

        <?php include 'footer.php'; ?>
    </body>
</html>