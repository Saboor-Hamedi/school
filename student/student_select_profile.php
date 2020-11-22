<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php $db = new Database();?>

<?php


if (isset($_POST["id"])) {
    $query = "SELECT id,bio, facebook, youtube,instagram, twitter, location FROM student_details WHERE id =   '".$_POST["id"]."'";
    $result = $db->select($query);
    $row = $result->fetch_array();
    echo json_encode($row);
}


