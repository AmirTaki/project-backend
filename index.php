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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <div class = "header" >
        <div class = "iconSidebar">
            <i class="bi bi-list"></i>
        </div>
        <div class = "logo">
            <img src="https://cdn.pixabay.com/photo/2016/12/17/18/12/logo-1914020_1280.png" alt="">
        </div>
      
        <div class = "containterHeader" style="background-color: white;">
            <div class = "deleteContainer">
                <i class="bi bi-x-lg"></i>
            </div>
            <?php foreach($menus as $menu) {?>
            <div class = "itemHeaderDiv">
                <div class = "itemHeader">
                    <div><?= $menu->title ?></div>
                    <div class = "arrowdownHeader"><i class="bi bi-chevron-down"></i></div>
                </div>
    
                <div class = "containerSidertoSider">
                    <?php foreach($megaMenu as $column ) {
                        if($column->title === $menu->title){?>
                    <div class = "itemSiderDiv">
                        <div class = "itemSidertoSider">
                            <div><?= $column->list ?></div>
                            <i><i class="bi bi-chevron-right"></i></i>
                        </div>
                    </div>
                 
                    <div class = "SideToinSide">
                        <div class = "backSideToSide">
                            <div class = 'arrowBacksideToside'>
                                <i class="bi bi-arrow-left"></i>
                                <div>back</div>
                            </div>
                            <div class = "exitSidebbar">
                                <i class="bi bi-x-lg"></i>
                            </div>
                        </div>
                        
                        <div class = "containerSideToinSide"> 
                            <div class = "itemCategory">
                                <div class ='titleCategory'>
                                    Category
                                </div>
                                <?php foreach($categoryTable as $category) {
                                    if($category->list == $column->list && $category->title == $menu->title){ ?>
                                <div class = "listCategory">
                                    <i class=<?= $category->sign ?>></i>
                                    <div><?= $category->category ?></div>
                                </div>
                                <?php }} ?>
                            </div>
                            <div class = "itemProduct">
                                <div class ='titleProduct'>
                                    Product
                                </div>
                                <?php foreach($seriesTable as $series) {
                                    if($series->list == $column->list && $series->title == $menu->title){ ?>
                                <div class = "listProduct">
                                    <div><?= $series->series ?></div>
                                </div>
                                <?php }} ?>
                            </div>
                            <div class = "itemImage">
                                <?php foreach($imageTable as $img) {
                                    if($img->list == $column->list &&  $img->title == $menu->title){  ?>
                                <div class ="containerImgae">
                                    <img src=<?= $img->image ?> alt="">
                                    <div class = "captionImage"><?= $img->body ?></div>
                                </div>
                                <?php }} ?>
                              
                            </div>  
                        </div>

                    </div>
                    <?php }} ?>
                </div> 
               
            </div>
            <?php } ?>
        </div>



        <div class = "searchIcon">
            <div><input type="search"></div>
            <i class="bi bi-search"></i>
            <div><i class="bi bi-person-circle"></i></div>
            <div class = "iconSearch_header"><i class="bi bi-person-circle"></i></div>
            <div class = "iconSearch_header"><i class="bi bi-person-circle"></i></div>
            <div class = "iconSearch_header"><i class="bi bi-person-circle"></i></div>
        </div>
    </div>
    <script src = "./src/script/main.js"></script>
</body>
</html>