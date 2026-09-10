<?php
 function dump (array|object $data): void
 {
     echo '<pre>' . print_r($data, 1) . '</pre>';
 }

 $fillable = ['name', 'email', 'password'];
 function load (array $fillable, $post = true): array
 {
     $loadData = $post ? $_POST : $_GET;
     $data = [];
     foreach ($fillable as $field) {
         if (isset($loadData[$field])) {
             $data[$field] = trim($loadData[$field]);
         }
         else {
             $data[$field] = '';
         }
     }
     return $data;
 };

 function h($string)
 {
     return htmlspecialchars($string ?? '',ENT_QUOTES, 'UTF-8');
 }

 function old ($name, $post = true)
 {
     $load_data = $post ? $_POST : $_GET;
     return isset($load_data[$name]) ? h($load_data[$name]) : '';
 }

 function register(array $data, PDO $db) : bool
 {

     $stmt = $db -> prepare("SELECT COUNT(*) FROM gb_users WHERE email = ?");
     $stmt -> execute([$data['email']]);
     if ($stmt -> fetchColumn()) {
         $_SESSION['errors'] = 'This email already exist';
         return false;
     }
     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
     $stmt = $db -> prepare('INSERT INTO gb_users (name, email, password) VALUES (:name, :email, :password)');
     $stmt -> execute($data);
     $_SESSION['success'] = 'You have success registered';
     return true;
 }