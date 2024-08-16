<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Person</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #dddddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<?php
require_once 'crud_function.php';
$persons = getAllPerson();
?>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
        </tr>
        <?php foreach ($persons as $person): ?>
            <tr>
                <td><?= $person['ID'] ?></td>
                <td><?= $person['Name'] ?></td>
                <td><?= $person['Gender'] ? 'Male' : 'Female' ?></td>
                <td><?= $person['DateOfBirth'] ?></td>
                <td>
                    <a href="/update_person.php?id=<?= $person['ID'] ?>">Update</a>
                    <a href="/delete_person.php?id=<?= $person['ID'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="create_person.php">Create</a>
</body>

</html>