
<?php include('../../config/config.php'); ?>
<?php include('../../database/database.php') ?>
<?php include('../../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>
<?php
if (isset($_POST["id"])) {
    $query = "SELECT * FROM post WHERE id = '".$_POST["id"]."'";
    $result = $db->select($query);
    $row = $result->fetch_array();
     echo json_encode($row);
}
