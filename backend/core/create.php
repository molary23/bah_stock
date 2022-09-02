<?php

$createUserTableSQL = "CREATE TABLE IF NOT EXISTS users (user_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, level INTEGER DEFAULT 0 NOT NULL";


$createCategoryTableSQL = "CREATE TABLE IF NOT EXISTS categories (category_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL, category_name VARCHAR(50) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, creator INTEGER NOT NULL";


$categories_fk_1 = "ALTER TABLE categories ADD CONSTRAINT categories_FK_1 FOREIGN KEY (creator) REFERENCES users(login_id) ON DELETE RESTRICT ON UPDATE CASCADE";

$createUserTableSQL = "CREATE TABLE users (user_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, phone VARCHAR(15) DEFAULT NULL)";

$user_fk_1 = "ALTER TABLE users ADD CONSTRAINT users_FK_1 FOREIGN KEY (user_login_id) REFERENCES login(login_id) ON DELETE RESTRICT ON UPDATE CASCADE";
