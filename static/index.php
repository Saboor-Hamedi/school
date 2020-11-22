<!--
   this is the main page, index.php
   -->
<?php session_start(); ?>
<?php
   $id = "";
   if ($_SESSION['admin_nim'] === NULL) {
       header('Location: /index.php');
   } else { ?>
<?php $id = $_SESSION['admin_nim']; ?>
<?php include('../inc/header.php'); ?>
<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.php"> <span class="align-middle">A.S Private High School</span> </a>
            <ul class="sidebar-nav">
                <i class="align-middle" data-feather="">
                    <hr />
                </i>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="index.php"> <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span> </a>
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
                    <a class="sidebar-link" href="students.php"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Schedule</span> </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="sendfiles.php"> <i class="align-middle" data-feather="book"></i> <span class="align-middle">Send File</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="admin_user.php"> <i class="align-middle" data-feather="book"></i> <span class="align-middle">Admin User</span> </a>
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
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown"> <i class="align-middle" data-feather="settings"></i> </a>
                        <?php
                     $query_image = "SELECT * FROM login WHERE admin_nim = '$id' ";
                     $query_image_row = $db->select($query_image); if ($query_image_row) { while ($row_image = $query_image_row->fetch_assoc()) { ?>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="../images/<?php echo $row_image['admin_image']; ?>" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
                            <span class="text-dark"><?php echo $row_image['admin_name']; ?></span>
                        </a>
                        <?php }}?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="">
                                <i class="align-middle mr-1" data-feather="user"></i>
                                <?php echo $id = $_SESSION['admin_nim']; ?>
                            </a>
                            <a class="dropdown-item" href="#"> <i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="students.php"> <i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy </a>
                            <a class="dropdown-item" href="#"> <i class="align-middle mr-1" data-feather="help-circle"></i> Help Center </a>
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
                   
                    <div class="alert alert-primary  " role="alert" id="insert_message_classes"></div>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-3 order-1 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <!-- change password  -->
                        <div class="card-header">
                            <h5 class="mb-0">Change Password</h5>
                        </div>
                        <form id="admin_change_password_form" method="POST">
                            <div class="alert alert-info" role="alert">
                                <div id="message_change_admin_password"></div>
                            </div>
                            <div class="form-box">
                                <input type="password" name="old_admin_password" class="form-control" id="old_admin_password" placeholder="Enter your old password" autocomplete="off" />
                                <input type="password" name="new_admin_password" class="form-control" id="new_admin_password" placeholder="Enter your new password" autocapitalize="off" />
                                <input type="password" name="confirm_admin_password" class="form-control" id="confirm_admin_password" placeholder="Confirm your new password" autocomplete="off" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="change_admin_password_btn" name="change_admin_password_btn">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xxl-9 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="mb-0">Admin Table</h5>
                        </div>
                        <div class="card-body" id="turn-on-scroll">
                            <div >
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $query = "SELECT * FROM login 
                                    ORDER BY admin_id and des_decrypt(admin_pass)";
                                    $query_rearch = $db->select($query); $count_row = mysqli_num_rows($query_rearch); if ($count_row <= 0) { echo '
                                    <div class="alert alert-primary" role="alert">
                                        No data found
                                    </div>
                                    '; } else { if ($count_row > 0) { while ($row = $query_rearch->fetch_assoc()) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $fm->increment(); ?></td>
                                            <td>
                                                <?php echo $row['admin_nim']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['admin_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['admin_email']; ?>
                                            </td>
                                            <td><img src="../images/<?php echo $row['admin_image']; ?>" alt="No image found" class="table_image" /></td>
                                        </tr>
                                    </tbody>
                                    <?php }
                              }
                              } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add new row -->
            </div>
        </main>
    </div>
</div>
<?php include('../inc/footer.php'); ?>
<?php } ?>
