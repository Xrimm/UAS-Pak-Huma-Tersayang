<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi_database.php";

$sql = "SELECT id_news, judul_news, gambar_berita, tanggal_rilis 
        FROM news
        ORDER BY tanggal_rilis DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Query error: " . $conn->error);
}

$newsList = $result->fetch_all(MYSQLI_ASSOC);
