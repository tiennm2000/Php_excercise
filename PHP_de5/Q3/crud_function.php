<?php
require_once "db_connection.php";

$pdo = getPDO();
function getAllEmployee()
{
    global $pdo;
    $sql = "SELECT Employee.id,Employee.name AS emName ,Employee.age,Employee.sex,Department.name AS deptName FROM Employee INNER JOIN Department ON Employee.dept_id = Department.id";
    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addEmployee($employeeId, $employeeName, $employeeAge, $employeeSex, $employeeDepartment)
{
    global $pdo;
    $sql = "INSERT INTO Employee VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$employeeId, $employeeName, $employeeDepartment, $employeeAge, $employeeSex,]);
}

function getAllDepartment()
{
    global $pdo;
    $sql = "SELECT * FROM Department";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
