<?php
include 'koneksi_database.php';

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
$result = $conn->query("select * from card order by jumlah_terjual desc limit 3");

while ($row = $result->fetch_assoc()) {
    $bestSeller[] = $row;
}
$q_card = "select * from card";