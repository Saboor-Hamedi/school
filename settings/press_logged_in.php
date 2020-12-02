<!-- this is the login button, the login button is in the /Dashboard/index.php -->

<?php include('./config/config.php');?>
<?php include('./database/database.php');?>
<?php include('./loging_script/login_script.php');?>
<?php $db = new Database(); ?>
<?php $check_login = new LoginCard($db); ?>
<?php session_start();?>
<?php
    $admin_nim = '';
    $admin_pass = '';
    $errors = array();
 if (isset($_POST['general_login_btn'])) {
     $admin_nim =  mysqli_real_escape_string($db->link, $_POST['admin_nim']);
     $admin_pass = mysqli_real_escape_string($db->link, $_POST['admin_pass']);
     if (empty($_POST['admin_nim'])) {
         array_push($errors, "ID should not be empty");
     }
     if (empty($_POST['admin_pass'])) {
         array_push($errors, "Password empty");
     }
     $check_login->check_login($admin_nim, $admin_pass);
 }

 