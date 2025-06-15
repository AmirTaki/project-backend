
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
    
 
    <div class = "header">
        <div class = "iconMenu">
            <i class="bi bi-list"></i>
        </div>
        <div>logo</div>
        <div class = "sidebar">
            <div class = "cross">
                <div class = "crossIcon"><i class="bi bi-x-lg"></i></div>
            </div>
            <?php foreach($menus as $menu)  {?>
            <div class = "menu">
                <div class = "menu-title">
                    <div class = "titleContainer">
                        <div><?= $menu->title ?></div>
                        <div class = "icon-title"> <i class="bi bi-chevron-down"></i></div>
                    </div>       
                    <div class = 'item'>
                        <?php foreach($megaMenu as $list) { 
                            if($list->title === $menu->title) {
                        ?>
                            <div class = "item-title"><?= $list->list ?>
                            <div class = "icon-item"><i class="bi bi-chevron-right"></i></div>
                            <div class = "container">
                                    <div class = "category">
                                        <?php 
                                            foreach($categoryTable as $category){
                                                if($category->title === $menu->title && $category->list === $list->list){
                                        ?>
                                            <div><?= $category->category ?></div>
                                        <?php  }}?>
                                    </div>
                                    <div class ="product">
                                        <?php 
                                            foreach($seriesTable as $series){
                                                if($series->title === $menu->title && $series->list === $list->list){
                                        ?>
                                            <div><?= $series->series ?></div>
                                        <?php }} ?>
                                    </div>
                                    <div class = "img">
                                        <?php 
                                            foreach($imageTable as $img){
                                                if($img->title === $menu->title && $img->list === $list->list){
                                        ?>
                                            <img src="<?= $img->image ?>" alt="">
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
            </div> 
            <?php } ?>     
        </div>
        <div>search icon</div>
    </div>
                                    
    <script src = "./script.js"></script>
</body>