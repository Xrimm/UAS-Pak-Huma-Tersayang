<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi_database.php";
session_start();

if (!isset($_SESSION['id_profile'])) {
    http_response_code(401);
    echo "Unauthorized";
    exit;
}

$id_profile = $_SESSION['id_profile'];

$username = trim($_POST['username'] ?? '');
$provinsi = trim($_POST['provinsi'] ?? '');
$photo    = $_FILES['photo'] ?? null;

if ($username === '' || $provinsi === '') {
    http_response_code(400);
    echo "Data tidak lengkap";
    exit;
}

/* ========= FOTO ========= */
$filename = null;
if ($photo && $photo['error'] === 0) {
    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
    $filename = 'profile_' . $id_profile . '_' . time() . '.' . $ext;
    move_uploaded_file(
        $photo['tmp_name'],
        "../uploads/profile/" . $filename
    );
}

/* ========= QUERY ========= */
if ($filename) {
    $stmt = $conn->prepare("
        UPDATE profiles
        SET username = ?, provinsi = ?, gambar_profile = ?
        WHERE id_profile = ?
    ");
    $stmt->bind_param("sssi", $username, $provinsi, $filename, $id_profile);
} else {
    $stmt = $conn->prepare("
        UPDATE profiles
        SET username = ?, provinsi = ?
        WHERE id_profile = ?
    ");
    $stmt->bind_param("ssi", $username, $provinsi, $id_profile);
}

$stmt->execute();

echo "success";
