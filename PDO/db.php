<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";
$error = '';

try{ 
    $error = '';
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Creatting DataBase if Not Exists
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->exec($sql);
    // Selecting DataBase
    $conn->exec("use $dbname");
    // Creating Table if not Exists
    $sql = "CREATE TABLE IF NOT EXISTS  MyGuests(id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, firstName VARCHAR(30) NOT NULL, lastName VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    $conn->exec($sql);

}catch(PDOException $e){
    $error = $e->getMessage();
}

?>