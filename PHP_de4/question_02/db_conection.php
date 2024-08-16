<?php
const SERVER_NAME = "localhost";
const USER_NAME = 'root';
const PASSWORD = '';
const DATABASE_NAME = 'tien';
const PORT = 3306;

function getPDO()
{

   try {
      $connectionString = "mysql:host=" . SERVER_NAME . ";port=" . PORT . ";dbname=" . DATABASE_NAME;
      $pdo = new PDO($connectionString, USER_NAME, PASSWORD);
      $sqlDb = file_get_contents("./data/database.sql");
      $sqlStructure = file_get_contents("./data/structure.sql");
      $sqlContent = file_get_contents("./data/content.sql");

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $pdo->exec($sqlDb);
      $pdo->exec($sqlStructure);
      $pdo->exec($sqlContent);

      echo "Database created and populated successfully";

      return $pdo;
   } catch (PDOException $e) {
      echo $e->getMessage();
   }
}
