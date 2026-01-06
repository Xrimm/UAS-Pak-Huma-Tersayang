<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "data/news_data.php";
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>News - Casholle</title>
        <link rel="stylesheet" href="css_assets/header.css">
        <link rel="stylesheet" href="css_assets/news_page.css">
        <link rel="stylesheet" href="css_assets/footer.css">
    </head>

    <body>
        <?php include 'header.php'; ?>

        <main class="news-wrapper">

            <h1 class="news-title">News</h1>

            <div class="news-list">

                <?php if (empty($newsList)): ?>
                    <p class="news-empty">Belum ada berita.</p>
                <?php else: ?>

                    <?php foreach ($newsList as $news): ?>
                        <div class="news-row">

                            <div class="news-date">
                                <?= date("d.m.Y", strtotime($news['tanggal_rilis'])) ?>
                            </div>

                            <div class="news-text">
                                <span class="news-category">NEWS</span>
                                <?= htmlspecialchars($news['judul_news']) ?>
                            </div>

                            <div class="news-thumb">
                                <img src="<?= htmlspecialchars($news['gambar_berita']) ?>" alt="gambar">
                            </div>

                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </main>

        <?php include 'footer.php'; ?>
    </body>
</html>
