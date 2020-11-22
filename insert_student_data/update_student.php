<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database(); ?>
<?php

$update_student_auto_id = "";
$update_student_main_id = "";
$update_student_name = "";
$update_student_lastname = "";
$update_student_address = "";
$update_email_student = "";
$update_student_age = "";
$update_student_country = "";
$update_student_auto_id = mysqli_real_escape_string($db->link, $_POST['update_student_auto_id']);
$update_student_main_id = mysqli_real_escape_string($db->link, $_POST['update_student_main_id']);
$update_student_name = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['update_student_name']));
$update_student_lastname = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['update_student_lastname']));
$update_student_address = mysqli_real_escape_string($db->link, $_POST['update_student_address']);
$update_email_student = mysqli_real_escape_string($db->link, $_POST['update_email_student']);
$update_student_age = mysqli_real_escape_string($db->link, $_POST['update_student_age']);
$update_student_country = mysqli_real_escape_string($db->link, $_POST['update_country_country']);
$update = "UPDATE student SET id = '$update_student_auto_id'
,nim = '$update_student_main_id'
,name = '$update_student_name'
,lastname = '$update_student_lastname'
,address = '$update_student_address'
,email = '$update_email_student'
,age = '$update_student_age'
,country = '$update_student_country'
    WHERE id = '$update_student_auto_id'";
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
