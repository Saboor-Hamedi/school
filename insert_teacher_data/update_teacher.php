<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database(); ?>
<?php

$update_teacher_auto_id = "";
$update_teacher_main_id = "";
$update_teacher_name = "";
$update_teacher_lastname = "";
$update_teacher_address = "";
$update_teacher_country = "";
$update_teacher_professions = "";
$update_teacher_auto_id = mysqli_real_escape_string($db->link, $_POST['update_teacher_auto_id']);
$update_teacher_main_id = mysqli_real_escape_string($db->link, $_POST['update_teacher_main_id']);
$update_teacher_name = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['update_teacher_name']));
$update_teacher_lastname = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['update_teacher_lastname']));
$update_teacher_address = mysqli_real_escape_string($db->link, $_POST['update_teacher_address']);
$update_teacher_country = mysqli_real_escape_string($db->link, $_POST['update_teacher_country']);
$update_teacher_professions = mysqli_real_escape_string($db->link, $_POST['update_teacher_professions']);
$update = "UPDATE teacher SET tec_id = '$update_teacher_auto_id'
            ,teacherid = '$update_teacher_main_id'
            ,tname = '$update_teacher_name'
            ,lastname = '$update_teacher_lastname'
            ,address = '$update_teacher_address'
            ,country = '$update_teacher_country'
            ,profession = '$update_teacher_professions' WHERE tec_id = '$update_teacher_auto_id'";
$update_row = $db->update($update);
if ($update_row) {
    echo 'Data is updating...';
    echo '
              <script>
             $.LoadingOverlay("show");
             setTimeout(function(){
             window.location.reload();
             // Show full page LoadingOverlay
             $.LoadingOverlay("hide");
             },3000);
             </script>
        ';
} else {
    echo 'Data not updated';
}
 $db->link->close();
