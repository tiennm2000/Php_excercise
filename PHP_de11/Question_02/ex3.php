<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        margin: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    h3 {
        text-align: center;
        font-size: 16px;
        font-weight: normal;
    }

    table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
        box-shadow: 3px 3px 3px #aaa;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    td a {
        color: blue;
        text-decoration: none;
        font-weight: bold;
    }

    td a:hover {
        text-decoration: underline;
    }
</style>


<?php
require_once "crud_function.php";
$employees = getAllInformationOfAllEmployees();
?>

<body>

    <h3>Click on the "Edit Info" link to Edit Employee's Information</h3>

    <table>
        <tr>
            <th>Emp No.</th>
            <th>Emp Name</th>
            <th>Update Details</th>
        </tr>

        <?php foreach ($employees as $employee) { ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['name'] ?></td>
                <td><a href="/update_employee.php?id=<?= $employee['id'] ?>">Edit Info</a></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>