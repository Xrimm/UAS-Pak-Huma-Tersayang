<?php
include 'koneksi_database.php';
include 'product.php';

$products = getAllProductsWithChild($conn);

$cardset = [];
$result = $conn->query("select * from cardset order by urutan_rilis desc limit 2 ");

while ($row = $result->fetch_assoc()) {
    $cardset[] = $row;
}
$q_cardset = "select * from cardset";

$news = [];
$result = $conn->query("select * from news order by tanggal_rilis desc limit 3");

while ($row = $result->fetch_assoc()) {
    $news[] = $row;
}
$q_news = "select * from news";

$bestSeller = [];
// urutkan produk berdasarkan jumlah_terjual
usort($products, function($a, $b) {
    return $b['jumlah_terjual'] - $a['jumlah_terjual'];
});

// ambil 3 teratas
$bestSeller = array_slice($products, 0, 3);