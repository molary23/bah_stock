<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Allow-Content-Allow-Headers: Allow-Content-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Access-Control-Allow-Origin, X-Requested-With');

include_once('../../core/initialize.php');

// Initiate Category class
$category = new Category($db);

$data = json_decode(file_get_contents('php://input'), true);

$category->category_name = $data->category_name;
$category->creator = $data->creator;
