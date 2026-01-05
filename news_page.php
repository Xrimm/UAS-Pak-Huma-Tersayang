<?php 
include "data/news_data.php";

$limit = 5; // jumlah news per halaman
$totalNews = count($news);
$totalPage = ceil($totalNews / $limit);

// ambil page dari URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalPage));

$start = ($page - 1) * $limit;
$newsPage = array_slice($news, $start, $limit);
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
        <?php foreach ($newsPage as $item): ?>
            <div class="news-row">

                <!-- TANGGAL -->
                <div class="news-date">
                    <?= date("d.m.Y", strtotime($item['date'])) ?>
                </div>

                <!-- JUDUL -->
                <div class="news-text">
                    <span class="news-category"><?= $item['category'] ?></span>
                    <?= $item['title'] ?>
                </div>

                <!-- GAMBAR -->
                <div class="news-thumb">
                    <img src="<?= $item['image'] ?>" alt="">
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <!-- PAGINATION -->
    <div class="pagination">
            <a href="news_page.php?page=1" class="page active">1</a>
            <a href="news_page2.php?page=2" class="page">2</a>
            <a href="news_page3.php?page=3" class="page">3</a>

    </div>

</main>

<?php include 'footer.php'; ?>
</body>
</html>
