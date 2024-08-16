<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 20px;
    }

    h3 {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    form {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 3px 3px 5px #aaa;
        border-radius: 5px;
    }


    form label {
        display: inline-block;
        width: 100px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    form input {
        width: calc(90% - 110px);
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form button {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #4CAF50;
        color: white;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
    }

    form button:hover {
        background-color: #45a049;
    }
</style>
<?php
require_once 'crud_function.php';
if (isset($_GET['id'])) {
    $idUpdated = $_GET['id'];
    $employee = getInformationById($idUpdated);
}

?>

<body>
    <h3>Update Employee's Information</h3>

    <form action="" method="post">

        <label for="em-id">Emp No</label>
        <input type="number" name="id" value="<?= $employee['id'] ?>" id="em-id" />

        <label for="em-name">Emp Name</label>
        <input type="text" name="name" value="<?= $employee['name'] ?>" id="em-name" />

        <label for="post">Post</label>
        <input type="text" name="position" value="<?= $employee['position'] ?>" id="post" />

        <label for="salary">Emp No</label>
        <input type="number" name="salary" value="<?= $employee['salary'] ?>" id="salary" />

        <button type="submit">Update</button>

    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $isSuccess = updateEmployee(['id' => $id, 'name' => $name, 'position' => $position, 'salary' => $salary], $idUpdated);
        if ($isSuccess) {
            echo "Updated Successfully";
            exit();
        } else {
            echo "Failed";
        }
    }
    ?>
</body>

</html>