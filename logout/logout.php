<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
unset($_SESSION['admin_nim']);
$_SESSION = array();
header('Location: /index.php');


