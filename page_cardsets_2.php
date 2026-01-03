<?php 
// Include data utama (opsional jika ingin mengambil data dasar)
include "data/cardsets.php"; 

// --- DATA UNTUK HALAMAN 2 (ARSIP LAMA) ---
// Kita kurangi lagi isinya menjadi 3 item saja
$imgExample = isset($cardsets[0]['img']) ? $cardsets[0]['img'] : 'images/banner.png';

$page2Data = [
    [
        "date" => "2024.12.25",
        "title" => "Booster Set #11: Heroes of Rivenbrandt",
        "img" => $imgExample
    ],
    [
        "date" => "2024.09.10",
        "title" => "Starter Deck: Runecraft & Bloodcraft",
        "img" => $imgExample
    ],
    [
        "date" => "2024.06.20",
        "title" => "Crossover Set: Code Geass Lelouch of the Rebellion",
        "img" => $imgExample
    ]
];

// Variabel penanda halaman aktif untuk header
$activePage = 'cardsets'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Sets Collection - Page 2</title>
    
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
            <?php foreach($page2Data as $item): ?>
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
            <a href="page_cardsets.php">1</a> 
            
            <span>2</span> 
            
            <a href="page_cardsets_3.php">3</a>
        </div>

    </div>

        <?php include 'footer.php'; ?>

</body>
</html>