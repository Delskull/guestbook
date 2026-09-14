<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$title = 'Home';
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/vendor/autoload.php';


/** @var PDO $db */
require_once __DIR__ . '/views/index.tpl.php';

