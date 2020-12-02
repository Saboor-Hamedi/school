<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database();?>
<?php
$insert_student_id_input = "";
$insert_student_name_input = "";
$insert_student_lastname_input = "";
$insert_student_address_input = "";
$insert_student_email_input = "";
$insert_student_age_input = "";
$insert_student_country_input = "";
$insert_student_pass_input = "";
$insert_student_conpass_input = "";
if (!empty($_POST)) {
    $insert_student_id_input = mysqli_real_escape_string($db->link, $_POST['insert_student_id_input']);
    $insert_student_name_input = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['insert_student_name_input']));
    $insert_student_lastname_input = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['insert_student_lastname_input']));
    $insert_student_address_input = mysqli_real_escape_string($db->link, $_POST['insert_student_address_input']);
    $insert_student_email_input = mysqli_real_escape_string($db->link, $_POST['insert_student_email_input']);
    $insert_student_age_input = mysqli_real_escape_string($db->link, $_POST['insert_student_age_input']);
    $insert_student_country_input = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['insert_student_country_input']));
    $insert_student_pass_input = mysqli_real_escape_string($db->link, $_POST['insert_student_pass_input']);
    $insert_student_conpass_input = mysqli_real_escape_string($db->link, $_POST['insert_student_conpass_input']);

    $insert_student_pass_input = password_hash($_POST['insert_student_pass_input'], PASSWORD_BCRYPT);
    $insert_student_conpass_input = password_hash($_POST['insert_student_conpass_input'], PASSWORD_BCRYPT);
    $duplicate = "SELECT  * FROM student WHERE nim = '$insert_student_id_input'";
    $check_dup = mysqli_query($db->link, $duplicate);
    if (mysqli_num_rows($check_dup) > 0) {
        echo 'This ID is already exists';
    } else {
        $sql = "INSERT  INTO student (nim,name, lastname, address, email,age, country, password,conpassword  )
        VALUES('$insert_student_id_input',
        '$insert_student_name_input',
        '$insert_student_lastname_input',
        '$insert_student_address_input',
        '$insert_student_email_input',
        '$insert_student_age_input',
        '$insert_student_country_input',
        '$insert_student_pass_input',
        '$insert_student_conpass_input')
            ";
        if ($db->insert($sql) === true) {
            echo 'Data is inserting...';
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
            echo 'Data not inserted';
        }
    }
    $db->closeConnection();
}
