<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        box-sizing: border-box;
        margin: 20px;
        padding: 0;
    }

    table {
        width: 50%;
        border-collapse: collapse;
        margin-bottom: 20px;
        margin: 0 auto;
        box-shadow: 3px 3px 5px #aaa;


    }

    th,
    td {
        border: 1px solid #000;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        color: #0066cc;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    h3 {
        text-align: center;
    }
</style>

<body>
    <?php
    require_once 'crud_function.php';
    $employees = getAllEmployee();
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Department</th>
            <th>Operation</th>
        </tr>

        <?php foreach ($employees as $employee) : ?>
            <tr>
                <?php foreach ($employee as $key => $value) : ?>
                    <td><?= $value ?></td>
                <?php endforeach; ?>
                <td><a href="">Update</a></td>
            </tr>
        <?php endforeach; ?>


    </table>
    <h3><a href="/add_employee.php">Add New</a></h3>
</body>

</html>