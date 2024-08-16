<?php
require_once "./db_connection.php";
$pdo = getPDO();

function getAllInformationOfAllEmployees()
{
    global $pdo;
    $sql = "SELECT * FROM employees";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createEmployee(array $data)
{
    global $pdo;
    $sql = "INSERT INTO employees VALUES(:id,:name,:position,:salary)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $data["id"], PDO::PARAM_INT);
    $stmt->bindParam("name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam("position", $data["position"], PDO::PARAM_STR);
    $stmt->bindParam("salary", $data["salary"], PDO::PARAM_INT);

    return $stmt->execute();
}

function updateEmployee(array $data, $lastedId)
{
    global $pdo;
    $sql = "UPDATE employees SET id=:id,name=:name,position=:position,salary=:salary WHERE id=:lastedId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $data["id"], PDO::PARAM_INT);
    $stmt->bindParam("name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam("position", $data["position"], PDO::PARAM_STR);
    $stmt->bindParam("salary", $data["salary"], PDO::PARAM_INT);
    $stmt->bindParam("lastedId", $lastedId, PDO::PARAM_INT);

    return $stmt->execute();
}

function getInformationById($id)
{
    global $pdo;

    $sql = "SELECT * FROM employees WHERE id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}