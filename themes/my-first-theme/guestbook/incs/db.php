<?php

$host = getenv('DB_HOST')?: 'mysql';
$dbName = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

try {
    $db = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}