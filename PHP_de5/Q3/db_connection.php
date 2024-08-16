<?php
function getPDO()
{
    try {
        $string_connection = 'mysql:host=localhost;port=3306;db_name=tien;';
        $pdo = new PDO($string_connection, 'root', "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $structure = file_get_contents("./data/structure.sql");
        $content = file_get_contents("./data/content.sql");

        $pdo->exec($structure);

        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
