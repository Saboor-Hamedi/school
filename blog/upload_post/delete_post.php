<?php include('../../config/config.php'); ?>
<?php include('../../database/database.php') ?>
<?php include('../../settings/formats.php') ?>
<?php $db = new Database(); ?>
<?php $fm = new format(); ?>
<?php
$id = $_POST['id'];
$dl = "DELETE FROM post WHERE id = '$id' ";
$result  = $db->delete($dl);

$db->closeConnection();
