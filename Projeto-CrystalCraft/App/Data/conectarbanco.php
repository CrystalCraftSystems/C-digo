<?php

$host = "localhost";
$dbname = "projeto-crystalcraft";
$username = "root";
$password = "masterkey";

try {
 
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
  echo "Ocorreu um erro: " . $e->getMessage();
}