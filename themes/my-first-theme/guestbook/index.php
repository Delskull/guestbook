<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$title = 'Home';
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_POST['send-message'])) {
    $data = load(['message']);
    $v = new \Valitron\Validator($data);
    $v -> rules([
        'required' => ['message']
    ]);
    if (!$v -> validate()) {
        $_SESSION['errors'] = get_errors($v ->errors());
    }
    else {
        save_messages($data,$db);
    redirect('index.php');
    }

}

/** @var PDO $db */
require_once __DIR__ . '/views/index.tpl.php';

