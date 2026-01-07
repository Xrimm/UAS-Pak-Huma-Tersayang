<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi_database.php";

$card_set = "SELECT id_cardset, nama_cardset, gambar_cardset, urutan_rilis
        FROM cardset
        ORDER BY urutan_rilis DESC";

$result = $conn->query($card_set);

if (!$result) {
    die("Query error: " . $conn->error);
}

$cardsets = $result->fetch_all(MYSQLI_ASSOC);
