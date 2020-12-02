<!-- login card -->
<?php include_once('inc/login_header/header.php');?>

    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="index.php" method="POST">
                        <h1>Login Form</h1>
                        <div class="login_message" id="login_message">
                            <?php echo $check_login->getError(); ?>
                            <?php  if (count($errors) > 0) : ?>
                            <?php foreach ($errors as $error) : ?>

                            <div>
                                <?php echo $error ?>
                            </div>


                            <?php endforeach ?>
                            <?php  endif ?>
                        </div>
                        <div>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($_POST['admin_nim']?? '', ENT_QUOTES) ?>"
                                name="admin_nim" placeholder="Username" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="admin_pass" placeholder="Password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default" name="general_login_btn">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-school"></i> A.S Private High School</h1>
                                <p>Welcome to A.S Private High School, <strong>desclaimer</strong> this tamplate is not my own</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                </section>
            </div>
        </div>
    </div>
<?php include_once('inc/login_header/footer.php');
