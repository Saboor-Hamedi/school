    <?php
    session_start();
    if (isset($_COOKIE['admin_nim'])):
        setcookie('admin_nim', '', time()-3600, '/');
    endif;

    session_unset();
    session_destroy();
    unset($_SESSION['admin_nim']);
    unset($_SESSION['admin_pass']);
    header("Location: /index.php");
    die();
