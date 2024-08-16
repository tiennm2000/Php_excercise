<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create person</title>
</head>

<body>
    <form method="get">
        Name:
        <input type="text" name="name" /><br />
        Gender:
        <label for="male"><input type="radio" name="gender" value="1">Male</label>
        <label for="male"><input type="radio" name="gender" value="0">Female</label><br />
        DOB:
        <input type="date" name="date" /><br />
        <input type="submit" value="Create">
    </form>
</body>

</html>

<?php
require_once 'crud_function.php';

if (isset($_GET['name']) && isset($_GET['gender']) && isset($_GET['date'])) {
    $newName = $_GET['name'];
    $newGender = (int) $_GET['gender'];
    $newDate = $_GET['date'];

    if (createPerson($newName, $newGender, $newDate)) {
        echo 'successfully';
        header('Location: http://localhost:3003/');

    } else {
        echo 'Failed to create. Please try again';
    }
}
?>