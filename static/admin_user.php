<?php session_start(); ?>
<?php
$id;
if ((!isset($_SESSION['user_id']))) {
      header('location: /index.php');  
}else { ?>
<?php $id = $_SESSION['admin_nim']; ?>
<?php  $PageTitle = "New User";?>
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
                    <a class="sidebar-link" href="teachers.php"> <i class="align-middle" data-feather="user"></i> <span
                            class="align-middle">Teachers</span> </a>
                </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">
                            Input Student' family
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" id="studentopen" href="students.php"> <i class="align-middle"
                            data-feather="user"></i> <span class="align-middle">Students</span> </a>
                    <script></script>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="clock"></i> <span
                            class="align-middle">Schedule</span> </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="sendfiles.php"> <i class="align-middle" data-feather="book"></i> <span
                            class="align-middle">Share File</span> </a>
                </li>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="admin_user.php"> <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Crate New Admin</span> </a>
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
                        <?php }
                        } ?>
                        <!-- end -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="">
                                <i class="align-middle mr-1" data-feather="user"></i>
                                <?php echo $id = $_SESSION['admin_nim'];?>
                                <!-- display the student ID on the drop down div -->
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
                    <div class="alert alert-primary" role="alert" id="insert_message_classes"></div>
                </nav>
            </div>
            <div class="contianer" id="admin_form">
                <div class="row" id="row_admin">
                    <div id="datetimepicker-dashboard">
                    <form method="post" id="admin_form" enctype="multipart/form-data">
                        <div class="aler alert-primary" role="alert" id="admin_error"></div>
                        <div class="inputs">
                            <input type="text" name="admin_nim" oninput="process(this)" class="form-control"
                                id="admin_nim" placeholder="Enter admin ID..." autocomplete="off"
                                oninput="process(this)" />
                            <input type="text" name="admin_name" class="form-control" id="admin_name"
                                placeholder="Enter admin name..." autocomplete="off" />
                            <input type="text" name="admin_lastname" class="form-control" id="admin_lastname"
                                placeholder="Enter last name..." autocomplete="off" />
                            <input type="text" name="admin_email" oninput="isEmail(this)" class="form-control"
                                id="admin_email" placeholder="Enter email..." autocomplete="off" />
                            <input type="password" name="admin_pass" class="form-control" id="admin_pass"
                                placeholder="Enter password..." autocomplete="off" />
                            <input type="password" name="admin_conpass" class="form-control" id="admin_conpass"
                                placeholder="Confirm password..." autocomplete="off" />
                        </div>
                        <div class="center">
                            <div class="admin-content-file">
                                <label for="admin-file" class="form-control" id="admin-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <input type="file" name="file" class="form-control" id="admin-file" accept="image/*"
                                    onchange="showPreview(event);" />
                                <div class="preview" id="image-preive">
                                    <img id="admin-file-preview" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"name="submit_bnt_admin" id="submit_bnt_admin">
                                Click me
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("admin-file-preview");
            preview.src = src;
            preview.style.display = "block";
            document.getElementById("admin-label").style.display = "none";
            document.getElementById("image-preive").style.marginBottom = "10px";
        }
    }
</script>
<script>
    // random ID for admin
    function RandomID() {
        let len = "";
        for (var i = 0; i < 14; i++) {
            len += Math.floor(Math.random() * 9);
        }
        return len;
    }
    document.getElementById("admin_nim").value = RandomID();
</script>
<?php include('../inc/footer.php'); ?>
<?php } ?>
