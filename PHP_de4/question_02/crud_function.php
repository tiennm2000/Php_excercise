<?php
    require_once "db_conection.php";
    $pdo = getPDO();

    function readItems($pageSize, $pageNumber) {
        global $pdo;
        $sql = 'SELECT * FROM tblItem LIMIT '.$pageSize. ' OFFSET '. ($pageNumber * $pageSize);
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTotalItems(){
        global $pdo;
        $sql = 'SELECT COUNT(*) FROM tblItem';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $total = $stmt->fetchColumn();
        return $total;
    }