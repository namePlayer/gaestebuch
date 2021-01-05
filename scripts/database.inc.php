<?php

try {
    $dbConnection = new PDO('mysql:host=127.0.0.1;dbname=gaestebuch', 'root', '');
} catch (PDOException $exception) {
    die('The DB Connection failed');
}