<!-- this file will update the last online on the database -->
<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php
session_start();
$id = 0 ;
?>
<?php
 if ($_SESSION['admin_nim'] === null) {
     //  header('Location: /index.php');
 } else { ?>

<?php
     $id = $_SESSION['admin_nim'];
     $db = new Database();
     function AdminLastLoggedin($admin_nim)
     {
         // update query time
         global $id ;
         global $db;
         $logged = "SELECT * FROM adminlastloggedin WHERE admin_nim  = '$admin_nim' LIMIT 1";
         $exist_id = $db->select($logged);
         if (mysqli_num_rows($exist_id) ==1) {
             $update_logged = "UPDATE adminlastloggedin set loggedintime = NOW() WHERE admin_nim = '$id'";
             $db->update($update_logged);
         } else {
             $insert = "INSERT INTO adminlastloggedin (admin_nim) VALUES('$admin_nim')";
             $db->insert($insert);
         }
     }

    //  student

      function StudentLastOnLline($admin_nim)
      {
          global $id ;
          global $db;
          $logged = "SELECT * FROM studentlastlogged WHERE nim  = '$admin_nim' LIMIT 1";
          $exist_id = $db->select($logged);
          if (mysqli_num_rows($exist_id) ==1) {
              $update_logged = "UPDATE studentlastlogged set loggedtime = NOW() WHERE nim = '$id'";
              $db->update($update_logged);
          } else {
              $insert = "INSERT INTO studentlastlogged (nim) VALUES('$admin_nim')";
              $db->insert($insert);
          }
      }


    ?>

<?php }
