<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi_database.php";

if (!isset($_SESSION['id_profile'])) {
    header("Location: register.php");
    exit;
}

$id_profile = $_SESSION['id_profile'];

// ambil notifikasi user
$stmtNotif = $conn->prepare("
    SELECT message, created_at, is_read
    FROM notif
    WHERE id_profile = ?
    ORDER BY created_at DESC
");
$stmtNotif->bind_param("i", $id_profile);
$stmtNotif->execute();
$resultNotif = $stmtNotif->get_result();
$notifs = $resultNotif->fetch_all(MYSQLI_ASSOC);


$stmt = $conn->prepare("
    SELECT username, email, provinsi, gambar_profile 
    FROM profiles 
    WHERE id_profile = ?
");
$stmt->bind_param("i", $id_profile);
$stmt->execute();
$result = $stmt->get_result();
$profile = $result->fetch_assoc();


$tabs = [
    "info"   => "Informasi Akun",
    "notif"  => "Notifikasi",
    "log"    => "Log Pembelian",
    "barang" => "Barang Jualan"
];

$daftar_provinsi = [
"Aceh","Sumatera Utara","Sumatera Barat","Riau","Kepulauan Riau",
"Jambi","Sumatera Selatan","Bangka Belitung","Bengkulu","Lampung",
"DKI Jakarta","Jawa Barat","Jawa Tengah","DI Yogyakarta","Jawa Timur",
"Banten","Bali","Nusa Tenggara Barat","Nusa Tenggara Timur",
"Kalimantan Barat","Kalimantan Tengah","Kalimantan Selatan","Kalimantan Timur",
"Kalimantan Utara","Sulawesi Utara","Sulawesi Tengah","Sulawesi Selatan",
"Sulawesi Tenggara","Gorontalo","Sulawesi Barat","Maluku","Maluku Utara",
"Papua","Papua Barat","Papua Tengah","Papua Pegunungan","Papua Selatan",
"Papua Barat Daya"
];

// default jika kosong
if(!$profile){
    $profile = [
        "username" => "Guest",
        "email" => "",
        "provinsi" => "",
        "gambar_profile" => "default.png"
    ];
}
