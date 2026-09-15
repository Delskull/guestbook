<?php
function dump(array|object $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function load(array $fillable, $post = true): array
{
    $loadData = $post ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $field) {
        if (isset($loadData[$field])) {
            $data[$field] = trim($loadData[$field]);
        } else {
            $data[$field] = '';
        }
    }
    return $data;
}

;

function h($string)
{
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

function old(string|int $name, bool $post = true): string
{
    $load_data = $post ? $_POST : $_GET;
    return isset($load_data[$name]) ? h($load_data[$name]) : '';
}

function register(array $data, PDO $db): bool
{

    $stmt = $db->prepare("SELECT COUNT(*) FROM gb_users WHERE email = ?");
    $stmt->execute([$data['email']]);
    if ($stmt->fetchColumn()) {
        $_SESSION['errors'] = 'This email already exist';
        return false;
    }
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $db->prepare('INSERT INTO gb_users (name, email, password) VALUES (:name, :email, :password)');
    $stmt->execute($data);
    $_SESSION['success'] = 'You have success registered';
    return true;
}

function redirect(string $url = ''): never
{
    header("LOCATION: {$url}");
    die;
}

function get_errors(array $errors): string
{
    $html = '<ul class="list-unstyled">';
    foreach ($errors as $errors_group) {
        foreach ($errors_group as $error) {
            $html .= "<li>$error</li>";
        }
    }
    $html .= '</ul>';
    return $html;
}

function login(array $data, PDO $db) : bool
{
    $stmt = $db->prepare("SELECT * FROM gb_users WHERE email = ?");
    $stmt->execute([$data['email']]);
    $row = $stmt->fetch();
        if (!$row || !password_verify($data['password'], $row['password'])) {
            $_SESSION['errors'] = 'wrong email or password';
            return false;
        }
        foreach ( $row as $key => $value) {
            if ($key != 'password') {
                $_SESSION['user'][$key] = $value;
            }
        }
    $_SESSION['success'] = 'You have success login';
     return true  ;
}
function check_auth(): bool
{
    return isset($_SESSION['user']);
}

function check_admin(): bool
{
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 2;
}

function save_messages(array $data, PDO $db) : bool
{
if (!check_auth()) {
    $_SESSION['errors'] = 'Login required';
    return false;
}
$stmt = $db -> prepare("INSERT INTO gb_messages (user_id, message) VALUES (?,?)");
$stmt -> execute([
    $_SESSION['user']['id'],
    $data['message']
]);
$_SESSION['success'] = 'your message add';
return true;
}

function get_messages( PDO $db)
{
    $where = '';
    if (!check_admin()) {
        $where .= 'WHERE status = 1';
    }
    $stmt = $db -> prepare("SELECT * FROM gb_messages {$where}");
    $stmt -> execute();
    return $stmt -> fetchAll();
}