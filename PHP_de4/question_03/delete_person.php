<?php
require_once 'crud_function.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $numberOfRecordsDelete = deletePerson($id);
    if ($numberOfRecordsDelete > 0) {
        header('Location: http://localhost:3003/');
        exit;
    } else {
        echo "Failed to delete record.";
    }
}
?>