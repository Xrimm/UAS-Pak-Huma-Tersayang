<?php 
// Variabel penanda halaman aktif agar menu navigasi di Header menyala
$activePage = 'cardsets'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Sets Collection - Page 3</title>
    
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
        
        <ul class="cardset_grid" style="min-height: 400px; list-style: none;">
            </ul>
        
        <div class="pagination_box">
            <a href="page_cardsets.php">1</a> 
            
            <a href="page_cardsets_2.php">2</a> 
            
            <span>3</span>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>