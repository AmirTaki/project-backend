<?php 

// use Dba\Connection;

// create database : adidas
function createDataBase ($name){
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    try {
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
        $connection = new PDO("mysql:host=$serverName",$userName, $password, $options);
        $sql = "CREATE DATABASE $name";
        $connection->exec($sql);
    }
    catch(PDOException $error) {
        return "Warning : ".$error->getMessage();

    }
}
// connect to dataBase
function connectDataBase ($dbName){
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    global $connection ;

    try { 
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
        $connection = new PDO ("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);
        return $connection;
    }
    catch(PDOException $error){
        return "Warning : ".$error->getMessage();
    }
}

// creat userTabel
function createUserTable ($dbName){
    try{
        $connection = connectDataBase($dbName)  ; 

        $sql = "CREATE TABLE `users`(
            `id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(130),
            `email` varchar(200) UNIQUE,
            `status` TINYINT NOT NULL DEFAULT 0,
            `password` varchar(130),
            `created_at` DATETIME 
        )";
        $connection->exec($sql);
    }
    catch(PDOException $error){
        return 'Warning : '.$error->getMessage();
    }
}

//read table to dataBase 
function readTable ($dbName, $query, $single = true, $execute = null){
    $pdo = connectDataBase($dbName);
    $statment = $pdo->prepare($query);
    $execute = null ? $statment->execute() : $statment->execute($execute);
    $reading  = $single ? $statment->fetch() : $statment->fetchAll();
    return $reading;
}

//  create account to user table
function createAccountToUserTable ($name, $email, $password, $dbname, $table){
    try {
        $connection = connectDataBase($dbname);
        $sql = "INSERT INTO $table SET name = ?, email = ?, password = ? , created_at = NOW();";
        $statment = $connection->prepare($sql);
        $statment->execute([$name, $email, $password]);
    }
    catch(PDOException $error){
        return "Warning : ".$error->getMessage();
    }
}

// operations dataBase
function operationsDataBase ($dbName, $query, $execute = null){
    $pdo = connectDataBase($dbName);
    $statment = $pdo->prepare($query);
    $statment =  $execute == null ? $statment->execute() : $statment->execute($execute);
    return $statment;
}

// check image
function checkImg ($img){
    $allowedMimes = ["png", "jpg", "avif", "webp", 'mp4', 'mp3', 'mpv','mov'];
    $imageMime = pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION);
    return in_array($imageMime, $allowedMimes);
}

// save image
function saveFiles ($locatoin, $fileName, $extension){
    $basePath = dirname(dirname(__DIR__));
    $path = '/adidas'.$locatoin .date("Y_m_d_H_i_s"). "." . $extension;
    $imgUpload = move_uploaded_file($_FILES[$fileName]['tmp_name'], $basePath . $path);
    return $imgUpload ? $path : false;
}

// delete files
function deleteFiles($path){
    $basePath = dirname(dirname(__DIR__));
    file_exists($basePath . $path) ? unlink($basePath . $path) : "";
}
?>