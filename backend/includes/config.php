<?php

define('DB_USER', 'root');
define('DB_NAME', 'bah_stock');
define('DB_PASSWORD', '');




try {
  $db = new PDO('mysql:host=localhost;dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
  printf("Error: %s\n", $e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

date_default_timezone_set('Africa/Lagos');

define('APP Name', 'BAH Stock Keeping App');
