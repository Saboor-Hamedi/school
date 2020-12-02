<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
   <meta name="author" content="AdminKit">
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=iso-8859-6">
   <meta name="keywords"
      content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
   <title><?php echo $PageTitle; ?>
   </title>
   <!-- this is for form, insert, udpate, delete -->
   <script src="../query_script/jquery-3.5.1.js"></script>
   <!-- this is for preloader -->
   <script src="../query_script/loadingoverlay.min.js"></script>

   <!-- jquery ui -->
   <link rel="stylesheet" href="../jquery_insert/jquery-ui.css">
   <script src="../jquery_insert/jquery-ui.js"></script>
   <!-- ================= -->
   <link rel="stylesheet" href="../jquery_insert/jquerytimepicker.css">
   <script src="../jquery_insert/jquerytimepicker.js"></script>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../fontawesome/css/all.min.css">
   <!-- the template css -->
   <link rel="stylesheet" href="../css/app.css">
   <!-- custome css -->
   <link rel="stylesheet" href="../style/style_for_template.css">

</head>

<body>
