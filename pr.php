
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
        <?php foreach($menus as $menu)  {?>
            <div class = "menu">
                <div class = "menu-title">
                    <div><?= $menu->title ?></div>
                    <div class = 'item'>
                        <?php foreach($megaMenu as $list) { 
                            if($list->title === $menu->title) {
                        ?>
                            <div><?= $list->list ?></div>
                            <div class = "container">
                                <div class = "category">
                                    <?php 
                                        foreach($categoryTable as $category){
                                            if($category->title === $menu->title && $category->list === $list->list){
                                    ?>
                                    <div><?= $category->category ?></div>
                                    <?php  }}?>
                                </div>
                                <div class ="product">product</div>
                                <div class = "img">img</div>
                            </div>
                            <?php }} ?>
                    </div>
                </div>
            </div> 
        <?php } ?> 
    </div>


</body>