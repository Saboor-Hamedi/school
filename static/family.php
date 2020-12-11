<!--
    this is the family file, where all file about famiy fetch and store
    anything about family can control from here
-->
<?php session_start(); ?>
<?php
$id = "";
if ((!isset($_SESSION['user_id']))) {
    header('location: /index.php');
} else { ?>
    <?php $id = $_SESSION['admin_nim']; ?>
    <?php $PageTitle = "Send file"; ?>
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
                        <a class="sidebar-link" href="index.php"> <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span> </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="students.php">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Students</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="teachers.php">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">
                                Teachers
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">
                                Input Student' family
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="credit-card"></i>
                            <span class="align-middle">Schedule</span> </a>
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="sendfiles.php"> <i class="align-middle" data-feather="book"></i> <span class="align-middle">Share File</span> </a>
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
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown"> <i class="align-middle" data-feather="settings"></i> </a>
                            <?php
                            $query_image = "SELECT * FROM login WHERE admin_nim = '$id' ";
                            $query_image_row = $db->select($query_image);
                            if ($query_image_row) {
                                while ($row_image = $query_image_row->fetch_assoc()) { ?>
                                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                        <img src="../images/<?php echo $row_image['admin_image']; ?>" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
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
                        <!-- error here -->
                        <div class="alert alert-primary" role="alert" id="send_file_message"></div>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-xxl-6 order-3 order-xxl-1">
                        <div class="card family-card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Family Information</h5>
                            </div>
                            <div id="turn-on-scroll">
                                <?php $sql = "SELECT * FROM student INNER JOIN family ON student.nim=family.nim GROUP BY student.nim ORDER BY family.nim DESC "; ?>
                                <?php $select_row = $db->select($sql); ?>
                                <?php if ($select_row) { ?>
                                    <?php while ($row = $select_row->fetch_assoc()) { ?>
                                        <table class="table table-dark">

                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>F-Name</th>
                                                    <th>F-Job</th>
                                                    <th>F-Income</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row['nim']; ?></td>
                                                    <td><?php echo $row['familyname']; ?></td>
                                                    <td><?php echo $row['familyjob']; ?></td>
                                                    <td><?php echo $row['familyincome']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <!-- add new row -->
                    <div class="col-12 col-md-6 col-xxl-6 order-3 order-xxl-1">
                        <div class="card family-card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Parent Information</h5>
                            </div>
                            <div class="card-body" id="turn-on-scroll">
                                <?php $sql = "SELECT * FROM student INNER JOIN parent ON student.nim=parent.nim INNER JOIN family ON parent.family_id=family.family_id GROUP BY student.nim ORDER BY family.nim desc"; ?>
                                <?php $select_row = $db->select($sql); ?>
                                <?php if ($select_row) { ?>
                                    <?php while ($row = $select_row->fetch_assoc()) { ?>
                                        <table class="table  table-dark">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>S-ID</th>
                                                    <th>F-ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row['parent_id']; ?></td>
                                                    <td><?php echo $row['nim']; ?></td>
                                                    <td><?php echo $row['family_id']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <?php include('../inc/footer.php'); ?>
<?php } ?>