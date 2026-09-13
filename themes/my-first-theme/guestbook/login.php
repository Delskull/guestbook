<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$title = 'Login';
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/views/login.tpl.php';
