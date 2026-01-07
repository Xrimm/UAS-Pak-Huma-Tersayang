<?php
session_start();
include "koneksi_database.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($username && $email && $password) {

        // cek username
        $cek = $conn->prepare("SELECT id_profile FROM profiles WHERE username=?");
        $cek->bind_param("s", $username);
        $cek->execute();
        $cek->store_result();

        if ($cek->num_rows > 0) {
            $message = "Username sudah digunakan";
        } else {
            $stmt = $conn->prepare("
                INSERT INTO profiles (username,email,pass_word)
                VALUES (?,?,?)
            ");
            $stmt->bind_param("sss", $username,$email,$password);
            $stmt->execute();

            header("Location: login.php");
            exit;
        }
    } else {
        $message = "Lengkapi semua data";
    }
}

include "register_view.php";
