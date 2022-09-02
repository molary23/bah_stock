<?php

class Category
{

  private $connect;
  private $table = 'categories';

  public $category_id, $category_name, $created_at, $updated_at, $creator, $username, $status;


  public function __construct($db)
  {
    $this->connect = $db;
  }

  public function read_all()
  {
    $query = 'SELECT
    c.category_id, c.category_name, c.created_at, c.updated_at, c.creator, u.username
    FROM ' . $this->table . ' c 
    INNER JOIN users u 
    ON c.creator = u.user_login_id
    WHERE c.status = ?
    ORDER BY c.created_at DESC';


    $stmt = $this->connect->prepare($query);
    $stmt->bindParam(1, $this->status, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
  }

  public function read_single()
  {
    $query = 'SELECT
    c.category_id, c.category_name, c.created_at, c.updated_at, c.creator, u.username
    FROM ' . $this->table . ' c 
    INNER JOIN users u 
    ON c.creator = u.user_login_id
    WHERE c.status = :status
    AND c.category_id = :category_id
    ORDER BY c.created_at DESC';


    $stmt = $this->connect->prepare($query);
    $this->category_id = intval($this->category_id);
    $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
    $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt;
  }

  public function create()
  {
    $sql = 'SELECT category_name
    FROM ' . $this->table . '
    WHERE category_name = ?';

    $stmt = $this->connect->prepare($sql);
    $this->category_name = htmlspecialchars(strip_tags($this->category_name));
    $stmt->bindParam(1, $this->category_name, PDO::PARAM_STR);
    $stmt->execute();

    $check = $stmt->rowCount();

    if ($check <= 0) {
      $query = 'INSERT INTO
    ' . $this->table . '
    (category_name, creator)
    VALUES (:category_name, :creator)
    LIMIT 1
    ';
    } else {
      return false;
    }
  }
}
