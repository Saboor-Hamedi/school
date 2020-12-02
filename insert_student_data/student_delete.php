<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php $db = new Database();?>
<?php
    $id = $_POST['id'];
    $dl = "DELETE FROM student WHERE id = '$id' ";
    $result  = $db->delete($dl);
    $db->closeConnection();



