<?php

$selectedType = $_GET['type'] ?? null;
$selectedCardset = $_GET['cardset'] ?? null;

$categories = [];

/* ================= CARD ================= */
$sql = "
SELECT DISTINCT
    cs.id_cardset,
    cs.nama_cardset,
    cs.urutan_rilis
FROM cardset cs
JOIN card c ON c.id_cardset = cs.id_cardset
JOIN products p ON p.id_product = c.id_product
WHERE p.product_type = 'Card'
ORDER BY cs.urutan_rilis
";
$res = $conn->query($sql);

while ($row = $res->fetch_assoc()) {
    $categories['Card']['Card Set'][] = [
        'id_cardset'   => $row['id_cardset'],
        'nama_cardset' => $row['nama_cardset']
    ];
}

/* ================= STARTER DECK ================= */
$sql = "
SELECT DISTINCT
    cs.id_cardset,
    cs.nama_cardset,
    cs.urutan_rilis
FROM cardset cs
JOIN starter_deck sd ON sd.id_cardset = cs.id_cardset
JOIN products p ON p.id_product = sd.id_product
WHERE p.product_type = 'Starter Deck'
ORDER BY cs.urutan_rilis
";
$res = $conn->query($sql);

while ($row = $res->fetch_assoc()) {
    $categories['Starter Deck']['Starter Deck'][] = [
        'id_cardset'   => $row['id_cardset'],
        'nama_cardset' => $row['nama_cardset']
    ];
}

/* ================= SLEEVE ================= */
$categories['Sleeve'] = [];

/* ================= FILTER PRODUCT ================= */
$allProducts = getAllProductsWithChild($conn);
$filteredProducts = [];

foreach ($allProducts as $p) {

    if ($selectedType && $p['product_type'] !== $selectedType) {
        continue;
    }

    if ($selectedCardset) {
        $found = false;

        foreach ($p['cards'] as $c) {
            if ($c['id_cardset'] === $selectedCardset) {
                $found = true;
                break;
            }
        }

        if (!$found && $p['starter_deck']) {
            if ($p['starter_deck']['id_cardset'] === $selectedCardset) {
                $found = true;
            }
        }

        if (!$found) continue;
    }

    $filteredProducts[] = $p;
}
