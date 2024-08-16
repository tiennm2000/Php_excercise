<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Cookie</title>
</head>
<style>
    body {
        margin: 20px;
    }

    table {
        margin: 0 auto;
        width: 300px;
        border-collapse: collapse;
        box-shadow: 3px 3px 5px #aaa;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 10px;
        text-align: left;
    }
</style>

<body>
    <table>
        <tr>
            <th>
                Cookie Name:
            </th>
            <th>
                Cookie Value:
            </th>
        </tr>

        <?php foreach ($_COOKIE as $key => $value) { ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php var_dump($_COOKIE); ?>
</body>

</html>