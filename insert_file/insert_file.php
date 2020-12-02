<?php
 include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php $db = new Database();?>

<?php
$student_insert_id_file = '';
$teacher_insert_id_file = '';
$file_insert_title = '';
$file_description = '';

if (!empty($_POST)) {
    $student_insert_id_file = mysqli_real_escape_string($db->link, $_POST['student_insert_id_file']);
    $teacher_insert_id_file = mysqli_real_escape_string($db->link, $_POST['teacher_insert_id_file']);
    $file_insert_title = mysqli_real_escape_string($db->link, $_POST['file_insert_title']);
    $file_description = mysqli_real_escape_string($db->link, $_POST['file_description']);
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file'];
        $filename = $_FILES['file']['name'];
        $filetmpname = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileerror = $_FILES['file']['error'];
        $filetype = $_FILES['file']['type'];
        $fileext = explode('.', $filename);
        // this peace of code will change the extention to lowercase
        $fileactualex = strtolower(end($fileext));
        $allow = array('jpg', 'jpeg', 'png', 'txt', 'pdf', 'doc', 'docx', 'xmls', 'java', 'gif', 'ex' ,'html');
        // check if the file is allowed
        if (in_array($fileactualex, $allow)) {
            if ($fileerror === 0) {
                if ($_FILES['file']['size'] <= 2000000) {
                    $fileDes = '../upload_files/';
                    if (move_uploaded_file($filetmpname, $fileDes . $filename)) {
                        $sql = "INSERT INTO files (nim,teacherid, file_title, file_description, file_attachment)
                     VALUES('$student_insert_id_file', '$teacher_insert_id_file', '$file_insert_title', '$file_description', '$filename' )";
                    
                        if ($db->insert($sql) === true) {
                            echo 'File is uploading...';
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
                            echo('File did not upload');
                        }
                    } else {
                        echo('Upload failed');
                    }
                } else {
                    echo("It's too large file. ");
                }
            } else {
                echo('There was an error during uploading the file.');
            }
        } else {
            echo('This file is not supporting  by system.');
        }
    }

         
    $db->closeConnection();
}

  
//  83789553791438
//  43632372818789
