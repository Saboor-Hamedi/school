<!-- this is our general login card -->
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
        $admin_nim = mysqli_real_escape_string($db->link, $_POST['admin_nim']);
        $admin_pass = mysqli_real_escape_string($db->link, $_POST['admin_pass']);
     if (empty($_POST['admin_nim'])) {
         array_push($errors, "ID should not be empty");
     }
     if (empty($_POST['admin_pass'])) {
         array_push($errors, "Password empty");
     }
     $check_login->check_login($admin_nim, $admin_pass);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- ripples -->
    <!-- <script src="../query_script/jquery-3.5.1.js"></script>
         <script src="/ripples/ripples.js"></script> -->
    <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <main id="main">
        <div class="wrapper">
        <form action="index.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control"
                        value="<?php echo htmlspecialchars($_POST['admin_nim']?? '', ENT_QUOTES) ?>"
                        name="admin_nim" placeholder="Enter Your ID">
                </div>
            <div class="form-group">
                <input type="password" class="form-control" name="admin_pass" placeholder="Enter Your Password">
            </div>
            <div class="form-group">
                <button type="submit" name="general_login_btn" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </div>
        </form>
        <div class="login_message"  id="login_message">
                <?php echo $check_login->getError(); ?>
                <?php  if (count($errors) > 0) : ?>
                <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?>
                </p>
                <?php endforeach ?>
                <?php  endif ?>
            </div>
        </div>
    </main>
    <script>
        history.pushState(null, null, null);
        window.addEventListener('popstate', function() {
            history.pushState(null, null, null);
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        // $(document).ready(function() {
        //     $('#main').ripples({
        //         resolution: 512,
        //         dropRadious: 10
        //     });
        //     $('body').ripples({
        //         resolution: 512,
        //         dropRadious: 10
        //     });
        // });
        setTimeout(function(){
            $('#login_message').fadeOut('slow');
        },1000);
    </script>
</body>
</html>