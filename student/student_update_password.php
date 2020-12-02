<?php session_start(); ?>
<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database();?>
<?php
$id = $_SESSION['admin_nim'];
$old_student_password = "";
$new_student_password = "";
$confirm_student_password = "";
    if (!empty($_POST)) {
        $old_student_password = mysqli_real_escape_string($db->link, $_POST['old_student_password']);
        $new_student_password = mysqli_real_escape_string($db->link, $_POST['new_student_password']);
        $confirm_student_password = mysqli_real_escape_string($db->link, $_POST['confirm_student_password']);
        $sql = "SELECT * FROM student WHERE nim = '".$_SESSION['admin_nim']."' ";
        $result = $db->select($sql);
        while ($row = $result->fetch_assoc()) {
            $hash = password_verify($old_student_password, $row['password']);
            if (!$hash) {
                echo 'Old password not matched';
            } else {
                if ($old_student_password == $new_student_password) {
                    echo "New password must be different";
                } else {
                    $new_student_password = password_hash($_POST['new_student_password'], PASSWORD_BCRYPT);
                    $confirm_student_password = password_hash($_POST['confirm_student_password'], PASSWORD_BCRYPT);

                    $update = $db->link->prepare("UPDATE student SET password = ?,
                   conpassword = ? WHERE  nim = '$id' ");
                    $update->bind_param('ss', $new_student_password, $confirm_student_password);
                    if ($update->execute()) {
                        echo "Password is updating";
                        echo '
                    <script>
                        $.LoadingOverlay("show");
                        setTimeout(function(){
                        window.location.reload();
                        $.LoadingOverlay("hide");
                        },3000);
                  </script>
              ';
                    } else {
                        echo "Some went wront";
                    }
                }
            }
        }
        $db->closeConnection();
    }
