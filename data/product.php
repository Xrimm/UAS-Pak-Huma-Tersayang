<?php
include 'koneksi_database.php';

function getAllProductsWithChild($conn) {
    $products = [];

    // Ambil semua produk + child
    $sql = "
            SELECT p.id_product, p.product_type, p.price, p.jumlah_tersedia, p.jumlah_terjual,
                  c.id_card, c.nama_card, c.tipe_card, c.rarity, c.gambar_card, c.id_cardset,
                  s.id_starter, s.nama_starter, s.cards_included, s.gambar_deck, s.id_cardset AS starter_id_cardset
            FROM products p
            
            LEFT JOIN card c 
                ON c.id_product = p.id_product 
                AND p.product_type = 'Card'

            LEFT JOIN starter_deck s 
                ON s.id_product = p.id_product 
                AND p.product_type = 'Starter Deck'

            ORDER BY p.id_product
    ";

    $result = $conn->query($sql);

    if($result) {
        while($row = $result->fetch_assoc()) {
            $pid = $row['id_product'];

            // Jika produk belum ada di array, buat entry baru
            if(!isset($products[$pid])) {
                $products[$pid] = [
                    'id_product' => $pid,
                    'product_type' => $row['product_type'],
                    'price' => $row['price'],
                    'jumlah_tersedia' => $row['jumlah_tersedia'],
                    'jumlah_terjual' => $row['jumlah_terjual'],
                    'cards' => [],
                    'starter_deck' => null
                ];
            }

            // Jika ada data card, masukkan ke array cards
            if($row['id_card']) {
                $products[$pid]['cards'][] = [
                    'id_card' => $row['id_card'],
                    'nama_card' => $row['nama_card'],
                    'tipe_card' => $row['tipe_card'],
                    'rarity' => $row['rarity'],
                    'gambar_card' => $row['gambar_card'],
                    'id_cardset' => $row['id_cardset']
                ];
            }

            // Jika ada data starter deck, simpan (asumsi 1 deck per produk)
            if ($row['id_starter']) {
                $products[$pid]['starter_deck'] = [
                    'id_starter' => $row['id_starter'],
                    'nama_starter' => $row['nama_starter'],
                    'cards_included' => $row['cards_included'],
                    'gambar_deck' => $row['gambar_deck'],
                    'id_cardset' => $row['starter_id_cardset']
                ];
            }


        }
    }

    return array_values($products); // kembalikan array numerik
}