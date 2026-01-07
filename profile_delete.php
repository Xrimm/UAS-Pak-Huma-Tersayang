<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// CEK SESSION
if (!isset($_SESSION['id_profile'])) {
    die("SESSION TIDAK ADA");
}

// CEK KONEKSI
include "koneksi_database.php";
if (!$conn) {
    die("KONEKSI DATABASE GAGAL");
}

$id_profile = $_SESSION['id_profile'];

// CEK PREPARE
$stmt = $conn->prepare("DELETE FROM profiles WHERE id_profile = ?");
if (!$stmt) {
    die("PREPARE GAGAL: " . $conn->error);
}

$stmt->bind_param("i", $id_profile);

// CEK EXECUTE
if (!$stmt->execute()) {
    die("EXECUTE GAGAL: " . $stmt->error);
}

if ($stmt->execute()) {
    session_destroy();
    echo "success";
}
