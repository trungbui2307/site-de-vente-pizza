<?php
$dsn = "mysql:host=localhost;dbname=2019_projet4_pizza";
$username = "root"; 
$password = ""; 


$db = new PDO($dsn, $username, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//$dsn = "sqlite:" . __DIR__ . "/../db/users.sqlite";

/*
 Définition de la BD:
 Pour MySQL:

  CREATE TABLE users
(
    userid INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    login VARCHAR(30) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user' NOT NULL
)

Pour SQLite:

CREATE TABLE users
(
    userid INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    login VARCHAR(30) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    role CHECK(role in ('user', 'admin')) DEFAULT 'user' NOT NULL
)
CREATE UNIQUE INDEX users_login_uindex ON users (login)

 */