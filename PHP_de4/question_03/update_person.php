<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<?php
require_once 'crud_function.php';
if (isset($_GET['id'])) {
    $person = getPersonById($_GET['id']);
}
?>

<body>
    <form method="post">
        Id:
        <input type="number" value="<?= $person['ID'] ?>" name="id" readonly><br />
        Name:
        <input type="text" value="<?= $person['Name'] ?>" name="name"><br />
        Gender:
        <label><input type="radio" name="gender" <?= $person['Gender'] === 1 ? 'checked' : "" ?> value="1">Male</label>
        <label><input type="radio" name="gender" <?= $person['Gender'] === 0 ? 'checked' : "" ?>
                value="0">Female</label><br />
        DOB:
        <input type="date" value="<?= $person['DateOfBirth'] ?>" name="date" /><br />
        <input type="submit" value="Create">

    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int) $_GET['id'];
        $name = $_POST['name'];
        $gender = (int) $_POST['gender'];
        $date = $_POST['date'];
        var_dump($id);
        var_dump($name);
        var_dump($gender);
        var_dump($date);
        if (updatePerson($id, $name, $gender, $date)) {
            header('Location: index.php');

        } else {
            echo 'Failed to update.Please try again';
        }
    }
    ?>
</body>

</html>