
<?php
require_once "./functions/check_section.php";
require_once "./functions/pdo_connection.php";
$menus = readTable ("asus", "SELECT * FROM asus.menu  Where status = 10", $single = false, $execute = null);
$megaMenu = readTable ("asus", "SELECT * FROM asus.megamenu  Where status = 10", $single = false, $execute = null);
$categoryTable = readTable ("asus", "SELECT * FROM asus.category  Where status = 10", $single = false, $execute = null);
$seriesTable = readTable ("asus", "SELECT * FROM asus.series  Where status = 10", $single = false, $execute = null);
$imageTable = readTable ("asus", "SELECT * FROM asus.img_menu  Where status = 10", $single = false, $execute = null);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <title>Document</title>
</head>
<body>
    <!-- HEADER -->
    <div class = "header" >
        <div class = "iconSidebar">
            <i class="bi bi-list"></i>
        </div>
        <div class = "logo">
            <img src="https://cdn.pixabay.com/photo/2016/12/17/18/12/logo-1914020_1280.png" alt="">
        </div>
        <!-- MEGAMENU & SIDEBAR -->
        <!-- TABLE MENU -->
        <?php  foreach($menus as $menu){ ?>
            <div class = "menu" style = "display:none" >
                <div style = "background-color: red;"><?= $menu->title ?></div>
                <?php foreach($megaMenu as $column) {
                    if($column->title === $menu->title){
                ?>
                <!-- TABLE MEGAMENU -->
                <div class = "list">
                    <div style = "background-color: blue;"><?= $column->list ?></div>
                    <?php foreach($categoryTable as $category) { 
                        if($category->title === $menu->title && $category->list === $column->list){
                    ?>
                    <!-- TABLE CATEGORY -->
                    <div class = "category">
                        <div style = "display: flex; background-color: greenyellow ;">
                            <div><?= $category->category ?></div>
                            <i class="<?= $category->sign ?>"></i>
                        </div>
                    </div>
                    <?php }} ?>
                    <!-- TABLE SERIES -->
                    <?php foreach($seriesTable as $series) {
                        if($series->list === $column->list && $series->title === $menu->title){
                    ?>
                    <div class = "product">
                        <div style = " background-color: pink "><?= $series->series ?></div>
                    </div>
                    <?php }} ?>
                    <!-- TABLE IMAGE -->
                    <?php foreach($imageTable as $img){
                        if ($img->list === $column->list && $img->title === $menu->title){
                    ?>
                    <div class = "image">
                        <div style = "background-color :aquamarine">
                            <img src="<?= $img->image ?>" alt="">
                            <div><?= $img->body ?></div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <?php }} ?>
            </div>
        <?php } ?>
        <!-- SEARCH ICON HEADER -->
        <div class = "searchIcon">
            <div><input type="search"></div>
            <i class="bi bi-search"></i>
            <div><i class="bi bi-person-circle"></i></div>
            <div class = "iconSearch_header"><i class="bi bi-person-circle"></i></div>
            <div class = "iconSearch_header"><i class="bi bi-person-circle"></i></div>
            <div class = "iconSearch_header"><i class="bi bi-person-circle"></i></div>
        </div>
    </div>
    <!-- SCRIPT FILE -->
    <script src = "./main.js"></script>
</body>
</html>