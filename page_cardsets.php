<?php 
// Include data
include "data/cardsets.php"; 

// Data Dummy untuk simulasi tampilan penuh
// Menggunakan gambar dari data asli agar tidak error
$imgExample = isset($cardsets[0]['img']) ? $cardsets[0]['img'] : 'images/banner.png';

$extraData = [
    ["date" => "2025.08.20", "title" => "Booster Set #12: Azvaldt, The Criminal Kingdom", "img" => $imgExample],
    ["date" => "2025.06.15", "title" => "Crossover Set: Idolmaster Cinderella Girls", "img" => $imgExample],
    ["date" => "2025.04.10", "title" => "Starter Deck: Dragoncraft & Havencraft", "img" => $imgExample],
    ["date" => "2025.01.01", "title" => "New Year Special Bundle 2025", "img" => $imgExample]
];

$fullCardSets = array_merge($cardsets, $extraData);
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
            <?php foreach($fullCardSets as $item): ?>
            <li class="cardsets">
                <a href="#">
                    <div class="thumb">
                        <img src="<?php echo $item['img']; ?>" alt="">
                    </div>
                    <div class="thumb_info">
                        <span class="date"><?php echo $item['date']; ?></span>
                        <h3 class="title"><?php echo $item['title']; ?></h3>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <div class="pagination_box">
            <span>1</span> 
            
            <a href="page_cardsets_2.php">2</a> 
            
            <a href="page_cardsets_3.php">3</a>
        </div>

    </div>

        <?php include 'footer.php'; ?>

</body>
</html>