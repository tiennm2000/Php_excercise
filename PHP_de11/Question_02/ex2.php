<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Of Employees</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 3px 3px 5px #aaa;
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

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form label {
        margin-top: 10px;
    }

    form input {
        margin-top: 5px;
        width: 200px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form button {
        margin-top: 20px;
        padding: 10px 20px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 4px;
    }

    form button:hover {
        background-color: #45a049;
    }
</style>

<body>
    <?php
    require_once "crud_function.php";
    $employees = getAllInformationOfAllEmployees();
    ?>

    <table>
        <tr>
            <th>Emp No.</th>
            <th>Emp Name</th>
            <th>Emp Post</th>
            <th>Emp Salary</th>
        </tr>

        <?php foreach ($employees as $employee): ?>
            <tr>
                <td>
                    <?= $employee['id'] ?>
                </td>
                <td>
                    <?= $employee['name'] ?>
                </td>
                <td>
                    <?= $employee['position'] ?>
                </td>
                <td>
                    <?= $employee['salary'] ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <form action="" method="post">
        <label for="em-id">Employee No:</label>
        <input type="number" name="id" id="em-id" />

        <label for="em-name">Employee Name:</label>
        <input type="text" name="name" id="em-name" />

        <label for="em-post">Employee Post:</label>
        <input type="text" name="position" id="em-post" />

        <label for="em-sal">Employee Salary:</label>
        <input type="number" name="salary" id="em-sal" />

        <button type="submit">Save Info</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $isSuccess = createEmployee(['id' => $id, 'name' => $name, 'position' => $position, 'salary' => $salary]);

        if ($isSuccess) {
            header('Location: ex2.php');
        } else {
            echo 'Fail to created employee';
        }
    }
    ?>
</body>

</html>