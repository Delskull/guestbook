<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$title = 'Login';

/** @var PDO $db */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/incs/db.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = load(['email', 'password']);
    $v = new Valitron\Validator($data);
    $v->rules([
        'required' => ['email', 'password'],
        'email' => ['email'],
    ]);

    if ($v->validate()) {
        if (login($data, $db)) {
            redirect('index.php');
        }

    } else {

        $_SESSION['errors'] = get_errors($v->errors());
    }
}
require_once __DIR__ . '/views/login.tpl.php';