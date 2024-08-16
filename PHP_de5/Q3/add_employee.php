<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Style the form container */
    form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    /* Style for form header */
    form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Style for form labels */
    label {
        display: inline-block;
        width: 100px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    /* Style for input fields */
    input[type="text"],
    select {
        width: calc(90% - 110px);
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style for radio buttons */
    input[type="radio"] {
        margin-left: 10px;
        margin-right: 5px;
    }

    /* Align radio buttons and labels horizontally */
    label[for="male"],
    label[for="female"] {
        display: inline-block;
        width: auto;
        margin-bottom: 0;
    }

    /* Style for submit button */
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<?php
require_once 'crud_function.php';
$departments = getAllDepartment();

?>

<body>
    <form action="" method="POST">
        <h2>Add New Employee</h2>
        <label for="id">ID</label>
        <input type="text" id="id" name="id" required><br>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>

        <label for="age">Age</label>
        <input type="text" id="age" name="age" required><br>

        <label>Sex</label>
        <label for="male">Male</label>
        <input type="radio" id="male" name="sex" value="male" required>
        <label for="female">Female</label>
        <input type="radio" id="female" name="sex" value="female" required><br>

        <label for="department">Department</label>
        <select id="department" name="department" required>
            <?php foreach ($departments as $department) : ?>
                <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Add New">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $departmentId = $_POST['department'];

        if (addEmployee($id, $name, $age, $sex, $departmentId)) {
            header('Location: index.php');
            exit;
        } else {
            echo "failed";
        }
    }
    ?>
</body>

</html>