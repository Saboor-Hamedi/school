<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database(); ?>
  <?php

    $insert_teacher_id_input = "";
    $insert_teacher_name_input = "";
    $insert_teacher_lastname_input = "";
    $insert_teacher_address_input = "";
    $insert_teacher_country_input = "";
    $insert_teacher_professions_input = "";
    $insert_teacher_pass_input = "";
    if (!empty($_POST)) {
        $insert_teacher_id_input = mysqli_real_escape_string($db->link, $_POST['insert_teacher_id_input']);
        $insert_teacher_name_input = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['insert_teacher_name_input']));
        $insert_teacher_lastname_input = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['insert_teacher_lastname_input']));
        $insert_teacher_address_input = mysqli_real_escape_string($db->link, $_POST['insert_teacher_address_input']);
        $insert_teacher_country_input = $fm->ToUpperCase(mysqli_real_escape_string($db->link, $_POST['insert_teacher_country_input']));
        $insert_teacher_professions_input = mysqli_real_escape_string($db->link, $_POST['insert_teacher_professions_input']);
        $insert_teacher_pass_input = mysqli_real_escape_string($db->link, $_POST['insert_teacher_pass_input']);
        $duplicate = "SELECT * FROM teacher WHERE teacherid = '$insert_teacher_id_input'";
        $check_dup = mysqli_query($db->link, $duplicate);

        if (mysqli_num_rows($check_dup) > 0) {
            echo 'This ID is already exists';
        } else {
            $sql = "INSERT  INTO teacher (teacherid,tname, lastname, address, country,profession, pass )
        VALUES('$insert_teacher_id_input',
        '$insert_teacher_name_input',
        '$insert_teacher_lastname_input',
        '$insert_teacher_address_input',
        '$insert_teacher_country_input',
        '$insert_teacher_professions_input',
        '$insert_teacher_pass_input')
            ";
            if ($db->insert($sql) === TRUE) {
                echo 'Data is inserting...';
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
                echo 'Data not inserted';
            }
        }
            $db->closeConnection();

    }
