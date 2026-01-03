<?php 
include "data/casholle_database.php";
include "data/homepage_query.php"

?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Casholle</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="css_assets/style.css">
        <link rel="stylesheet" href="css_assets/header.css">
        <link rel="stylesheet" href="css_assets/news.css">
        <link rel="stylesheet" href="css_assets/cardsets.css">
        <link rel="stylesheet" href="css_assets/best_seller.css">
        <link rel="stylesheet" href="css_assets/casholle_database_showcase.css">
        <link rel="stylesheet" href="css_assets/footer.css">
    </head>
    
    <body>

        <?php include 'header.php'; ?>

        <div class="hero-bg"></div>

        <section class="newest_index">

            <section class="home1">
                <!-- Bagian Kiri -->
                <div class="newest_news">
                    <div class="news_header">
                        <h1>News</h1>
                        <div class="more"><a href="">MORE &gt;</a></div>
                    </div>

                    <ul>
                        <?php foreach($news as $item): ?>
                        <li>
                            <div class="flex_news">
                                <span class="date"><?php echo $item['tanggal_rilis']; ?></span>
                                <a target="_blank" href="<?php echo $item['link_berita']; ?>">
                                    <span class="title"><?php echo ' ' . $item['judul_news']; ?></span>
                                </a>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>

            <section class="home2">
                <!-- Bagian Kanan -->
                <div class="news_header">
                    <h1>New Cardsets</h1>
                    <div class="more"><a href="">MORE &gt;</a></div>
                </div>

                <ul>
                    <?php foreach($cardset as $item): ?>
                    <li class="cardsets">
                        <a href="">
                            <div class="thumb">
                                <img src="<?php echo $item['gambar_cardset']; ?>" alt="cardset">
                            </div>

                            <div class="thumb_info">
                                <span class="date"><?php echo $item['nama_cardset']; ?></span>
                                <h3 class="title"><?php echo ' ' . $item['urutan_cardset']; ?></h3>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </section>


        <section class="best_seller_wrap">
            <section class="best_seller">
                <h1 class="best_title">Best Seller</h1>

                <div class="podium">
                    <?php foreach ($bestSeller as $item): ?>
                        <div class="card">
                            <img src="<?= $item['gambar_card']; ?>" alt="<?= $item['nama_card']; ?>">

                            <h2><?= $item['nama_card']; ?></h2>

                            <span class="rarity" data-rarity="<?= $item['rarity']; ?>">
                                <?= ucfirst($item['rarity']); ?>
                            </span>

                            <span class="sold">
                                Terjual <?= number_format($item['jumlah_terjual']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </section>
        

        <section class="database_showcase">
            <h2>Casholle Database</h2>
            <p class="database_p">Ringkasan data gudang Casholle</p>

            <div class="casholle_cards">
                <div class="casholle_count">
                    <div class="icon">🃏</div>
                    <div class="number"><?= $jumlahJenisKartu ?></div>
                    <div class="label">Jenis Kartu Terdaftar</div>
                </div>

                <div class="casholle_count">
                    <div class="icon">💳</div>
                    <div class="number"><?= $jumlahKartuTerjual ?></div>
                    <div class="label">Kartu Terjual</div>
                </div>

                <div class="casholle_count">
                    <div class="icon">📦</div>
                    <div class="number"><?= $jumlahKartuTersedia ?></div>
                    <div class="label">Kartu Tersedia</div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>
