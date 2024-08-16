<!DOCTYPE html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['name'];
    $password = $_POST['password'];
    setcookie('username', $userName, time() + (86400 * 30), '/list_cookie.php');
    setcookie('password', $password, time() + (86400 * 30), '/list_cookie.php');
    header('Location: list_cookie.php');
    exit;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
    body {
        margin: 20px;
    }

    form {
        width: 300px;
        padding: 15px;
        margin: 0 auto;
        border: 1px solid #ccc;
        box-shadow: 3px 3px 5px #aaa;
        border-radius: 10px;
    }

    form label {
        display: inline-block;
        width: 100px;
    }

    form input {
        width: calc(90%-100px);
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form button {
        margin-top: 20px;
        display: block;
        padding: 10px;
        border: none;
        background-color: #4CAF50;
        color: white;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
    }
</style>

<body>
    <form action="" method="post">
        <label for="u-name">Username:</label>
        <input type="text" name="name" id="u-name" />

        <label for="p">Password:</label>
        <input type="password" name="password" id="p" />

        <button type="submit">Login</button>
    </form>
</body>

</html>