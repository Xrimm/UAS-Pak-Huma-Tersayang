<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "koneksi_database.php";

if (!isset($_SESSION['id_profile'])) {
    die("SESSION id_profile tidak ada. Pastikan sudah login.");
}

if (!isset($_POST['order_id'])) {
    die("order_id tidak terkirim dari form.");
}

$profile_id = $_SESSION['id_profile'];
$order_id   = $_POST['order_id'];

// update status transaksi (pakai id_transaksi)
$update = mysqli_query($conn, "
    UPDATE transaksi 
    SET status = 'paid' 
    WHERE id_transaksi = '$order_id' AND id_profile = '$profile_id'
");

if (!$update) {
    die("Error update transaksi: " . mysqli_error($conn));
}

// buat pesan notifikasi
$message = "Terima kasih 🙌 Pesanan #$order_id berhasil dibayar.";

// insert ke tabel notif
$insert = mysqli_query($conn, "
    INSERT INTO notif (id_profile, message) 
    VALUES ('$profile_id', '$message')
");

if (!$insert) {
    die("Error insert notifikasi: " . mysqli_error($conn));
}

header("Location: profile.php");
exit;
?>
