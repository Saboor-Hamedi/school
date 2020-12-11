<!--
this is the main page, index.php
-->
<?php session_start(); ?>
<?php
$id = "";
if ((!isset($_SESSION['user_id']))) {
      header('location: /index.php');  
}else { ?>
<?php $id = $_SESSION['admin_nim']; ?>
<?php  $PageTitle = "Send file";?>
<?php include('../inc/header.php'); ?>
<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.php"> <span class="align-middle">A.S Private High School</span> </a>
            <ul class="sidebar-nav">
                <i class="align-middle" data-feather="">
                    <hr />
                </i>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php"> <i class="align-middle" data-feather="sliders"></i> <span
                            class="align-middle">Dashboard</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="teachers.php">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">
                            Teachers
                        </span>
                    </a>
                </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="family.php">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">
                            Input Student' family
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="students.php"> <i class="align-middle" data-feather="user"></i> <span
                            class="align-middle">Students</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="credit-card"></i>
                        <span class="align-middle">Schedule</span> </a>
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="sendfiles.php"> <i class="align-middle" data-feather="book"></i> <span
                            class="align-middle">Share File</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="admin_user.php">
                        <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Crate New Admin</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle d-flex"> <i class="hamburger align-self-center"></i> </a>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown"> <i
                                class="align-middle" data-feather="settings"></i> </a>
                        <?php
            $query_image = "SELECT * FROM login WHERE admin_nim = '$id' ";
            $query_image_row = $db->select($query_image); if ($query_image_row) {
                while ($row_image = $query_image_row->fetch_assoc()) { ?>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="../images/<?php echo $row_image['admin_image']; ?>"
                                class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
                            <span class="text-dark"><?php echo $row_image['admin_name']; ?></span>
                        </a>
                        <?php   }
            } ?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="">
                                <i class="align-middle mr-1" data-feather="user"></i>
                                <?php
                        echo $id = $_SESSION['admin_nim'];
                    ?>
                            </a>
                            <a class="dropdown-item" href="#"> <i class="align-middle mr-1"
                                    data-feather="pie-chart"></i> Analytics </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="students.php"> <i class="align-middle mr-1"
                                    data-feather="settings"></i> Settings & Privacy </a>
                            <a class="dropdown-item" href="#"> <i class="align-middle mr-1"
                                    data-feather="help-circle"></i> Help Center </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout/logout.php">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="content">
            <div class="custom-bread">
                <nav aria-label="breadcrumb">
                    <!-- error here -->
                    <div class="alert alert-primary" role="alert" id="send_file_message"></div>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-xxl-6 order-3 order-xxl-1">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Single File</h5>
                        </div>
                        <div class="card-body" id="turn-on-scroll">
                            <!-- send file for student  -->
                            <form id="send_file_for_student_form" method="POST" enctype="multipart/form-data">
                                <div class="form-box">
                                    <input type="text" oninput="process(this)" name="student_insert_id_file"
                                        class="form-control" id="student_insert_id_file"
                                        placeholder="Enter student ID..." autocomplete="off" />
                                    <input type="text" oninput="process(this)" name="teacher_insert_id_file"
                                        class="form-control" id="teacher_insert_id_file"
                                        placeholder="Enter teacher ID..." autocapitalize="off" />
                                    <input type="text" name="file_insert_title" id="file_insert_title"
                                        class="form-control" placeholder="What is the title... ?" autocomplete="off" />
                                    <div style="margin-top: 5px;">
                                        <textarea cols="30" rows="10" name="file_description" class="form-control"
                                            id="file_description" placeholder="Type some description..."
                                            autocomplete="off"></textarea>
                                    </div>
                                    <input type="file" name="file" id="send_file" class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary mr-auto" id="send_file_for_student_btn"
                                        name="send_file_for_student_btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- add new row -->
                <div class="col-12 col-md-6 col-xxl-6 order-3 order-xxl-1">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add something here</h5>
                        </div>
                        <div class="card-body" id="turn-on-scroll"></div>
                    </div>
                </div>
                <!-- add new row -->
            </div>
        </main>
    </div>
</div>
<?php include('../inc/footer.php'); ?>
<?php }
