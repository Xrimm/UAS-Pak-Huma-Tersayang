<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi_database.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $conn->prepare(
            "SELECT id_profile, pass_word FROM profiles WHERE username = ?"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Jika password belum di-hash
            if ($user['pass_word'] === $password) {
                $_SESSION['id_profile'] = $user['id_profile'];
                header("Location: profile.php");
                exit;
            } else {
                $message = "Password salah!";
            }
        } else {
            $message = "Username tidak ditemukan!";
        }
    } else {
        $message = "Harap isi username dan password!";
    }
}

// tampilkan view
include "login_view.php";