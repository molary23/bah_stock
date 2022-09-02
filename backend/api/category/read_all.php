<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../core/initialize.php');

// Initiate Category class
$category = new Category($db);
$category->status = isset($_GET['status']) ? $_GET['status'] : 'a';

$result = $category->read_all();
$count = $result->rowCount();

if ($count > 0) {
  $post_arr = array();
  $post_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $post_item = array(
      'category_id' => $category_id,
      'category_name' => $category_name,
      'created_at' => $created_at,
      'updated_at' => $updated_at,
      'creator' => $creator,
      'username' => $username
    );
    array_push($post_arr['data'], $post_item);
  }
  echo json_encode($post_arr);
} else {
  echo json_encode(array('error' => 'no category found'));
}
