<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "data/cardset_data.php";
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Card Sets - Casholle</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="css_assets/style.css">
        <link rel="stylesheet" href="css_assets/header.css">
        <link rel="stylesheet" href="css_assets/footer.css">
        <link rel="stylesheet" href="css_assets/cardsets.css">
        <link rel="stylesheet" href="css_assets/page_cardsets_style.css?v=<?= time(); ?>">
    </head>
    <body>

        <?php include 'header.php'; ?>

        <div class="page_container">
            <h1 class="page_title">Card Sets Collection</h1>

            <ul class="cardset_grid">

                <?php if (empty($cardsets)): ?>
                    <p>Belum ada card set.</p>
                <?php else: ?>

                    <?php foreach($cardsets as $item): ?>
                    <li class="cardsets">
                        <a href="#">
                            <div class="thumb">
                                <img src="<?= htmlspecialchars($item['gambar_cardset']); ?>" alt="">
                            </div>

                            <div class="thumb_info">
                                <span class="date">
                                    <?= date("d.m.Y", strtotime($item['urutan_rilis'])); ?>
                                </span>

                                <h3 class="title">
                                    <?= htmlspecialchars($item['nama_cardset']); ?>
                                </h3>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>

                <?php endif; ?>

            </ul>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
