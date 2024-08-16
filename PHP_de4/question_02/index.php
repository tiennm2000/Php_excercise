<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table list</title>
    <style>
        table {
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
        }
        .pagination li {
            margin: 5px;
            padding: 5px;
            border: 1px solid #ddd;
        }
        .pagination li.active {
            font-weight: bold;
        }
    </style>
</head>
<?php
    require_once 'crud_function.php';

    $currentPage = $_GET['page']??0;
    $itemPerPage = 10;
    $totalItems = getTotalItems();
    $totalPages = ceil($totalItems/$itemPerPage);

    $items = readItems($itemPerPage,$currentPage);

?>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
            <?php 
                foreach($items as $item){
                    echo '<tr>';
                    echo '<td>' . $item['id'] . '</td>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '</tr>';
                }
            ?>
    </table>
    <ul class="pagination">
        <?php
        for ($i = 0; $i < $totalPages; $i++) {
            $class = ($currentPage == $i) ? "active" : "";
            echo "<li class='$class'><a href='?page=$i'>$i</a></li>";
        }
        ?>
    </ul>
</body>
</html>

