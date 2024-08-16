<?php

const USER_NAME = "root";
const PASSWORD = "";
const SERVER_NAME = "localhost";
const DATABASE_NAME = "tien";
const PORT = 3306;

function createPDO()
{

    try {
        $connection_string = "mysql:host=" . SERVER_NAME . ';port=' . PORT . ';dbname=' . DATABASE_NAME;
        $pdo = new PDO($connection_string, USER_NAME, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlDb = file_get_contents('./data/database.sql');
        $sqlStructure = file_get_contents('./data/structure.sql');
        $sqlContent = file_get_contents('./data/content.sql');

        $pdo->exec($sqlDb);
        $pdo->exec($sqlStructure);
        if ($pdo->query('SELECT COUNT(*) FROM tblPerson')->fetchColumn() === 0) {
            $pdo->exec($sqlContent);
        }

        return $pdo;
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }
}
