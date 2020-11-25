<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $fm = new format();?>
<?php $db = new Database();?>
<?php
$admin_nim = "";
$admin_name = "";
$admin_lastname = "";
$admin_email = "";
$admin_pass = "";
$admin_conpass = "";

    if (!empty($_POST)) {
        $admin_nim = mysqli_real_escape_string($db->link, trim($_POST['admin_nim']));
        $admin_name = mysqli_real_escape_string($db->link, trim($_POST['admin_name']));
        $admin_lastname = mysqli_real_escape_string($db->link, trim($_POST['admin_lastname']));
        $admin_email = mysqli_real_escape_string($db->link, trim($_POST['admin_email']));
        $admin_pass = mysqli_real_escape_string($db->link, trim($_POST['admin_pass']));
        $admin_conpass = mysqli_real_escape_string($db->link, trim($_POST['admin_conpass']));
        $admin_pass = password_hash($_POST['admin_pass'], PASSWORD_BCRYPT);
        $duplicate = "SELECT  * FROM login WHERE admin_nim = '$admin_nim'";
        $check_dup = mysqli_query($db->link, $duplicate);
       
        if (mysqli_num_rows($check_dup) > 0) {
            echo 'This ID is already exists';
        } else {
            if (isset($_FILES['file']['name'])) {
                $profileimage = time() . '-' .$_FILES['file']['name'];
                $target = '../images/' . $profileimage;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                    $sql = "INSERT  INTO login (admin_nim, admin_name, admin_lastname, admin_email, admin_pass,admin_conpass, admin_image)
                    VALUES('$admin_nim',
                    '$admin_name',
                    '$admin_lastname',
                    '$admin_email',
                    '$admin_pass',
                    '$admin_conpass','$profileimage')";
                    if ($db->insert($sql) === true) {
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
                } else {
                    echo 'Data and image not uploaded';
                }
            }
            
            $db->link->close();
        }
    }
