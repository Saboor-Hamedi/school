<?php session_start(); ?>
<?php
$id;
if ($_SESSION['admin_nim'] == null) {
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
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php"> <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="teachers.php"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Teachers</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" id="studentopen" href="students.php"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students</span> </a>
                    <script></script>
                </li>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="clock"></i> <span class="align-middle">Schedule</span> </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="sendfiles.php"> <i class="align-middle" data-feather="book"></i> <span class="align-middle">Send Files</span> </a>
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
    $query_image_row = $db->select($query_image);
    if ($query_image_row) {
        while ($row_image = $query_image_row->fetch_assoc()) { ?>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="../images/<?php echo $row_image['admin_image']; ?>" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
                            <span class="text-dark"><?php echo $row_image['admin_name']; ?></span>
                        </a>
                        <?php
        }
    } ?>
                        <!-- end -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="">
                                <i class="align-middle mr-1" data-feather="user"></i>
                                <?php
    echo $id = $_SESSION['admin_nim'];
?>
                                <!-- display the student ID on the drop down div -->
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
                    <div class="alert alert-primary" role="alert" id="insert_message_classes"></div>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex order-3 order-xxl-1">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Classes</h5>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xxl-3 order-1 order-xxl-1">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Make new class</h5>
                        </div>
                        <form id="student_insert_form" method="POST">
                            <div class="form-box">
                                <select name="insert_grade_class" id="insert_grade_class" class="form-control">
                                    <option value="0">Select Class</option>
                                    <option value="1">Class 1</option>
                                    <option value="2">Class 2</option>
                                    <option value="3">Class 3</option>
                                    <option value="4">Class 4</option>
                                    <option value="5">Class 5</option>
                                    <option value="6">Class 6</option>
                                    <option value="7">Class 7</option>
                                    <option value="8">Class 8</option>
                                    <option value="9">Class 9</option>
                                    <option value="10">Class 10</option>
                                    <option value="11">Class 11</option>
                                    <option value="12">Class 12</option>
                                </select>
                                <input type="text" class="form-control" id="insert_class_code" name="insert_class_code" placeholder="What is the class code...?" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_class_name" name="insert_class_name" placeholder="What is the class name...?" autocomplete="off" />
                                <div style="margin-top: 5px;">
                                    <select name="insert_days_of_weeks_class" class="form-control" id="insert_days_of_weeks_class">
                                        <option value="0">Select class day</option>
                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursay">Thursday</option>
                                        <option value="friday">Friday</option>
                                        <option value="saturday">Sturday</option>
                                        <option value="sunday">Sunday</option>
                                    </select>
                                </div>
                                <!-- time picker -->
                                <div style="margin-top: 5px;">
                                    <!-- <input type="text" class="form-control" id="insert_class_year_name" name="insert_class_year_name" placeholder="e.g, 2010-01-01" autocomplete="off" /> -->
                                    <select name="insert_class_year_name" id="insert_class_year_name" class="form-control">
                                        <option value="0"> Select Academic year </option>
                                        <?php
    $sql = "SELECT * FROM academic_year";
    $query = $db->select($sql);
    while ($row = $query->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['year_name'] ?>">
                                            <?php echo $row['year_name']; ?>
                                            <?php
    } ?>
                                        </option>
                                    </select>
                                </div>
                                <!-- end time picker -->
                                <div class="form-group">
                                    <input type="text" class="form-control" id="insert_class_start_time" name="insert_class_start_time" placeholder="Class start at...?" autocomplete="off" />
                                </div>
                                <!-- 
            this is for subjects
            -->
                                <div style="margin-top: 5px;">
                                    <select name="insert_class_subject" id="insert_class_subject" class="form-control">
                                        <option value="0">Select a subject</option>
                                        <?php
    $query_class = "SELECT * FROM subjects";
    $select_rows = $db->select($query_class);
    if ($select_rows) {
        while ($row = $select_rows->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['subjectid'] ?>">
                                            <?php echo $row['subjectname']; ?>
                                        </option>
                                        <?php
        }
    } ?>
                                    </select>
                                </div>
                                <!-- 
                            this teachers list
                            -->
                                <div style="margin-top: 5px;">
                                    <select name="insert_class_teacher" id="insert_class_teacher" class="form-control">
                                        <option value="0">Select a teacher</option>
                                        <?php
                            $query_class = "SELECT * FROM teacher";
                            $select_rows = $db->select($query_class);
                             if ($select_rows) {
                                 while ($row = $select_rows->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['teacherid'] ?>">
                                                    <?php echo $row['tname']; ?>
                                                </option>
                                                <?php
                                }
                             } ?>
                                    </select>
                                </div>
                                <!-- student  -->
                                <div class="insert_class_search_div">
                                    <div class="student_search_class_input">
                                        <input type="text" id="search_box" name="search_box" class="form-control" placeholder="Search for student ID" autocomplete="off" />
                                    </div>
                                    <div id="suggesstion-box"></div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="insert_class_btn" name="insert_class_btn">Submit</button>
                        </div>
                        <!-- end the form -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include('../inc/footer.php'); ?>
<?php } ?>
