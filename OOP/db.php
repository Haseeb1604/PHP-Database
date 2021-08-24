<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($host, $username, $password);
    if($conn->connect_error) die("Error! Couldn't connect to database : " + $conn->connect_error);

    // Creating Database using MySqli OOP
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($sql) or die("Database not created successfully");

    $conn->select_db($dbname) or die("Database not Connected successfully");

    $sql = "CREATE TABLE IF NOT EXISTS myguest(id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, firstName VARCHAR(30) NOT NULL, lastName VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

    $conn->query($sql) or die("Error Creating Table: $sql");

?>