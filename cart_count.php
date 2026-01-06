<?php
function getCartProducts($allProducts, $cart) {
    $cartProductIds = array_keys($cart);
    return array_filter($allProducts, function($p) use ($cartProductIds) {
        return in_array($p['id_product'], $cartProductIds);
    });
}

function getCartTotal($cartProducts, $cart) {
    $total = 0;
    foreach($cartProducts as $p) {
        $qty = $cart[$p['id_product']] ?? 0;
        $total += $p['price'] * $qty;
    }
    return $total;
}
?>