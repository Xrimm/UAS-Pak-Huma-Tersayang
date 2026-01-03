<?php
include 'koneksi_database.php';

// Jumlah Kartu
$jumlahJenisKartu = 0;
$result = $conn->query("select count(*) as total from card");

$row = $result->fetch_assoc();
$jumlahJenisKartu = $row['total'];

// Jumlah Terjual
$jumlahKartuTerjual = 0;
$result = $conn->query("select sum(jumlah_terjual) as terjual from card");

$row = $result->fetch_assoc();
$jumlahKartuTerjual = $row['terjual'];

// Jumlah Tersedia
$jumlahKartuTersedia = 0;
$result = $conn->query("select sum(jumlah_tersedia) as tersedia from card");

$row = $result->fetch_assoc();
$jumlahKartuTersedia = $row['tersedia'];
