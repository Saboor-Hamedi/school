<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php $db = new Database();?>

<?php
$id = $_POST['id'];
    $dl = "DELETE FROM teacher WHERE tec_id = '$id' ";
    $result  = $db->delete($dl);
     $db->link->close();

 


