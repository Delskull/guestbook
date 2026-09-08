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