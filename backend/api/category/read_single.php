<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../core/initialize.php');


// Initiate Category class
$category = new Category($db);

$category->category_id = isset($_GET['id']) ? $_GET['id'] : die();
$category->status = isset($_GET['status']) ? $_GET['status'] : 'a';

$result = $category->read_single();
$count = $result->rowCount();

if ($count > 0) {
  $row = $result->fetch(PDO::FETCH_ASSOC);
  echo json_encode($row);
} else {
  echo json_encode(array('error' => 'no category with the ID provided'));
}
