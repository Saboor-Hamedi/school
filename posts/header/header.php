<?php
   //set headers to NOT cache a page
   header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
   header("Pragma: no-cache"); //HTTP 1.0
   header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
   //or, if you DO want a file to cache, use:
   header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap 4 Blog Template For Developers</title>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Cache-control" content="public">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Blog Template">
      <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
      <link rel="shortcut icon" href="favicon.ico">
      <!-- FontAwesome JS-->
     
       <script defer src="assets/fontawesome/js/all.min.js"></script>
      <!-- boxicons -->

      <!-- Theme CSS -->
      <link id="theme-style" rel="stylesheet" href="assets/css/theme-1.css">
      <link rel="stylesheet" href="../../style/bg_post.css">
   </head>
   <body>
 