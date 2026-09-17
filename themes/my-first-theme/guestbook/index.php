<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$title = 'Home';
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/incs/Pagination.php';
/** @var PDO $db */

if (isset($_POST['send-message'])) {
    $data = load(['message']);
    $v = new \Valitron\Validator($data);
    $v->rules([
        'required' => ['message']
    ]);
    if (!$v->validate()) {
        $_SESSION['errors'] = get_errors($v->errors());
    } else {
        save_messages($data, $db);
        redirect('index.php');
    }
}


$page = $_GET['page'] ?? 1;
$per_page = 2;
$total = get_count_messages($db);
$pagination = new Pagination((int) $page, $per_page, $total);
$start = $pagination -> getStart();
$messages = get_messages($start, $per_page, $db);

require_once __DIR__ . '/views/index.tpl.php';

