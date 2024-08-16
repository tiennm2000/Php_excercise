<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        a:first-of-type {
            margin-right: 10px;
        }

        div {
            text-align: center;
        }

        ul {
            color: red;
        }
    </style>
</head>
<?php
// Initialize variables to store error messages
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["employeeNo"]))) {
        $errors[] = "You must input employee number";
    }


    if (empty(trim($_POST["employeeName"]))) {
        $errors[] = "You must input employee name";
    }


    if (empty(trim($_POST["employeeWork"]))) {
        $errors[] = "You must input place of work";
    }

    if (empty(trim($_POST["phoneNo"]))) {
        $errors[] = "You must input phone no";
    }

    // If there are no errors, proceed with processing the form data
    if (empty($errors)) {

        // You can now proceed with storing the data in a database, sending an email, etc.

        echo "Form submitted successfully!";
        // Optionally, redirect to another page
        // header("Location: success.php");
        exit;
    }
}
?>

<body>



    <form action="" method="post" id="employeeForm">
        <?php if (!empty($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h2>Input Employee information</h2>

        <label for="em-no">Employee No</label>
        <input type="number" name="employeeNo" id="em-no">

        <label for="em-name">Name</label>
        <input type="text" name="employeeName" id="em-name">

        <label for="pfw">Place Of Work</label>
        <input type="text" name="employeeWork" id="pfw">

        <label for="phoneNo">Phone No</label>
        <input type="text" id="phoneNo" name="phoneNo"><br><br>

        <div>
            <a href="#" id="addNew">Add New</a>
            <a href="back_to_list.php">Back To List</a>
        </div>
    </form>

    <script>
        document.getElementById("addNew").addEventListener("click", function(event) {
            document.getElementById("employeeForm").submit(); // Submit the form
        });
    </script>


</body>

</html>