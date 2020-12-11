<?php
session_start();

$id = 0;
if ($_SESSION['admin_nim'] === null) {
    header('Location: /index.php');
} else {
    if (!isset($_GET['id']) || empty($_GET['id']) && $_GET['id'] == null) {
        echo '<script>window.location.href="/error-404.html";</script>';
    } else {
        $id = base64_decode($_GET['id']);
    }
}
?>

<?php $PageTitle = "Setings"; ?>
<?php include('../inc/header.php'); ?>
<?php
$sql = "SELECT nim FROM student WHERE nim ='$id'";
$val = mysqli_query($db->link, $sql);
while ($row = mysqli_fetch_array($val)) { ?>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand"> <span class="align-middle">A.S Private High School</span> </a>
                <ul class="sidebar-nav">
                    <i class="align-middle" data-feather="">
                        <hr />
                    </i>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="visit-student-account.php?id=<?php echo base64_encode($row['nim']); ?>"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students</span> </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="visit-students-setting.php?id=<?php echo base64_encode($row['nim']); ?>"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Settings</span> </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="main">
            <div class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex"> <i class="hamburger align-self-center"></i> </a>
            </div>
            <main class="content">
                <div class="custom-bread">
                    <nav aria-label="breadcrumb">
                        <!-- error here -->
                    </nav>
                </div>

                <div class="setting">
                    <div class="setting-panel">
                        <div class="setting-card">
                            <h1>Empty card</h1>
                        </div>
                        <div class="setting-card">
                            <h1>Empty card</h1>
                        </div>
                        <div class="setting-card">
                            <h1>Empty card</h1>
                        </div>
                        <div class="setting-card">
                            <h1 >Change Password</h1>
                            <form id="visit-change-form" method="POST">
                                <div class="alert alert-info" role="alert">
                                    <div id="visit-change-message"></div>
                                </div>
                                <div class="form-box">
                                    <input type="hidden" name="student_change_password_id" id="student_change_password_id" class="form-control" value="<?php echo $row['nim']; ?>" placeholder="Enter student ID" autocomplete="off" />
                                    <input type="password" name="new_student_password" class="form-control" id="new_student_password" placeholder="Enter your new password" autocapitalize="off" />
                                    <input type="password" name="confirm_student_password" class="form-control" id="confirm_student_password" placeholder="Confirm your new password" autocomplete="off" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="change_visit_password_btn" name="change_visit_password_btn">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php } ?>
<?php include('../inc/footer.php'); ?>