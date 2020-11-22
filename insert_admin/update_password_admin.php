<?php session_start(); ?>
<?php

    
?>
<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database();?>
<?php
$id = $_SESSION['admin_nim'];
$old_admin_password = "";
$new_admin_password = "";
$confirm_admin_password = "";
   
    if (!empty($_POST)) {
        $old_admin_password = mysqli_real_escape_string($db->link, $_POST['old_admin_password']);
        $new_admin_password = mysqli_real_escape_string($db->link, $_POST['new_admin_password']);
        $confirm_admin_password = mysqli_real_escape_string($db->link, $_POST['confirm_admin_password']);
        $sql = "SELECT * FROM login WHERE admin_nim = '".$_SESSION['admin_nim']."' ";
        $result = $db->select($sql);
        while ($row = $result->fetch_assoc()) {
            $hash = password_verify($old_admin_password, $row['admin_pass']);
            if (!$hash) {
                echo 'Old password not matched';
            } else {
                $new_admin_password = password_hash($_POST['new_admin_password'], PASSWORD_BCRYPT);
                $confirm_admin_password = password_hash($_POST['confirm_admin_password'], PASSWORD_BCRYPT);
                $update = "UPDATE  login SET admin_pass = '$new_admin_password', admin_conpass = '$confirm_admin_password' WHERE  admin_nim = '$id' ";
               
                if ($db->update($update) === true) {
                    echo "Password is updating";
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
                    echo "Password not update";
                }
            }
        }
         $db->link-> close();

    }
