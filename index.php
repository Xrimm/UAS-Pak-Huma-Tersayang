<?php 
include "data/news.php";
include "data/card_sets.php";
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Casholle</title>
        <link rel="stylesheet" href="css_assets/style.css">
        <link rel="stylesheet" href="css_assets/header.css">
        <link rel="stylesheet" href="css_assets/news.css">
    </head>
    
    <body>

        <?php include 'header.php'; ?>

        <div class="hero-bg"></div>

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
                        <a href="#">
                            <span class="date"><?php echo $item['date']; ?></span>
                            <span class="title"><?php echo ' ' . $item['title']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
             </div>
        </section>
    </body>
</html>
