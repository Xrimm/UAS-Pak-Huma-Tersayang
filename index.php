<?php 
include "data/news.php";
include "data/cardsets.php";
include "data/best_seller.php";
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
                        <div class="more">MORE &gt;</div>
                    </div>

                    <ul>
                        <?php foreach($news as $item): ?>
                        <li>
                            <a href="">
                                <span class="date"><?php echo $item['date']; ?></span>
                                <span class="title"><?php echo ' ' . $item['title']; ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>

            <section class="home2">
                <!-- Bagian Kanan -->
                <div class="news_header">
                    <h1>New Cardsets</h1>
                    <div class="more">MORE &gt;</div>
                </div>

                <ul>
                    <?php foreach($cardsets as $item): ?>
                    <li class="cardsets">
                        <a href="">
                            <div class="thumb">
                                <img src="<?php echo $item['img']; ?>" alt="">
                            </div>

                            <div class="thumb_info">
                                <span class="date"><?php echo $item['date']; ?></span>
                                <h3 class="title"><?php echo ' ' . $item['title']; ?></h3>
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
                    <?php foreach ($bestSellers as $item): ?>
                        <div class="card">
                            <img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>">

                            <h2><?= $item['name']; ?></h2>

                            <span class="rarity" data-rarity="<?= $item['rarity']; ?>">
                                <?= ucfirst($item['rarity']); ?>
                            </span>

                            <span class="sold">
                                Terjual <?= number_format($item['sold']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </section>
    </body>
</html>
