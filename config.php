<?php

    $host = "localhost";
    $dbname = "locker_db";
    $userdbname = "root";
    $password = "root";
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $userdbname, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>