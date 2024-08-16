<?php
const SERVER_NAME = "localhost";
const USER_NAME = "root";
const PASSWORD = "";
const DB_NAME = "tien";
const PORT = 3306;

function getPDO()
{
    try {
        $connection_string = "mysql:host=" . SERVER_NAME . ";port=" . PORT . ";dbname=" . DB_NAME;
        $dbh = new PDO($connection_string, USER_NAME, PASSWORD, array(PDO::ATTR_PERSISTENT => true));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlStructure = file_get_contents("./data/structure.sql");
        $sqlContent = file_get_contents("./data/content.sql");

        $dbh->exec($sqlStructure);
        if ($dbh->query('SELECT COUNT(*) FROM employees')->fetchColumn() === 0) {
            $dbh->exec($sqlContent);
        }
        return $dbh;
    } catch (PDOException $e) {
        echo "Fail " . $e->getMessage();
    }
}