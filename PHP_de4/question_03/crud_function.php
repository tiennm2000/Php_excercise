<?php
require_once "db_connection.php";

$pdo = createPDO();



function getAllPerson()
{
    global $pdo;

    $query = 'SELECT * FROM tblPerson';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function createPerson($name, $gender, $dateOfBirth)
{
    global $pdo;
    $query = 'INSERT INTO tblPerson(Name, Gender, DateOfBirth) VALUES(:name,:gender,:dateOfBirth) ';
    $stmt = $pdo->prepare($query);


    $success = $stmt->execute(['name' => $name, 'gender' => $gender, 'dateOfBirth' => $dateOfBirth]);

    return $success ? true : false;
}

function updatePerson($id, $newName, $newGender, $newDateOfBirth)
{
    global $pdo;

    $query = 'UPDATE tblPerson SET Name=:name, Gender=:gender, DateOfBirth = :dateOfBirth WHERE ID = :id  ';
    $stmt = $pdo->prepare($query);

    $success = $stmt->execute(['id' => $id, 'name' => $newName, 'gender' => $newGender, 'dateOfBirth' => $newDateOfBirth]);
    if ($success) {
        return true;
    }

    return false;
}

function deletePerson($id)
{
    global $pdo;
    $query = 'DELETE FROM tblPerson WHERE ID=:id';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function getPersonById($id)
{
    global $pdo;

    $query = 'SELECT * FROM tblPerson WHERE ID=:id';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}