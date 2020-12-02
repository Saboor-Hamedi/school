<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php $db = new Database();?>
<?php
    $id = mysqli_escape_string($db->link, $_POST['id']);
    $name = mysqli_query($db->link ,"SELECT * FROM files WHERE file_id = '$id'");
    $row= mysqli_fetch_array($name);
    $dl = "DELETE FROM files WHERE file_id = '$id' ";
    $result  = $db->delete($dl);
    $path = "../upload_files/".$row['file_attachment'];
    unlink($path);    

// 83789553791438
// 92254794233844