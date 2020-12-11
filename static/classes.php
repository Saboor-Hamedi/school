<?php session_start(); ?>
<?php
$id;
if ((!isset($_SESSION['user_id']))) {
    header('location: /index.php');
} else { ?>
    <?php $id = $_SESSION['admin_nim']; ?>
    <?php $PageTitle = "Schedules"; ?>
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
                        <a class="sidebar-link" href="family.php">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">
                                Input Student' family
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" id="studentopen" href="students.php"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students</span> </a>
                        <script></script>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="clock"></i> <span class="align-middle">Schedule</span> </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="sendfiles.php"> <i class="align-middle" data-feather="book"></i> <span class="align-middle">Share File</span> </a>
                    </li>
                    <li class="sidebar-item">
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
                    <div class="col-12 col-md-12 col-xxl-9" id="row-gap">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="mb-0">Classes</h5>
                            </div>
                            <div class="card-body" id="turn-on-scroll">

                                <!-- 

													display schedules based on the year
													-->
                                <?php
                                $year = null;
                                $sql = "SELECT * FROM student
										INNER JOIN classes ON student.nim=classes.nim
										INNER JOIN subjects ON classes.subjectid= subjects.subjectid
										INNER JOIN teacher ON classes.teacherid=teacher.teacherid
										INNER JOIN academic_year ON classes.year_name=academic_year.year_name
										ORDER BY classes.class_grade ";
                                ?>
                                <?php $query = mysqli_query($db->link, $sql);
                                $num_rows = mysqli_num_rows($query);
                                if ($num_rows <= 0) {
                                    echo "No classes available";
                                } ?>
                                <?php while ($result = mysqli_fetch_array($query)) { ?>
                                    <?php if ($year != ($result['class_grade'] . ' Academic Year ' . $result['class_grade'])) { ?>
                                        <table class="table table-bordered table-dark" id="classes_table">
                                            <div class="grades">
                                                <h3><?php echo $result['name'] . ", Grade" . $result['class_grade']; ?>
                                                </h3>
                                            </div>
                                            <thead>
                                                <tr>
                                                    <?php $year = $result['class_grade'] . ' Academic Year ' . $result['class_grade']; ?>
                                                    <th>No</th>
                                                    <th>Days</th>
                                                    <th>Class grade</th>
                                                    <th>Teacher Name</th>
                                                    <th>Course</th>
                                                    <th>Start Time</th>
                                                    <th>Academic Year</th>
                                                </tr>
                                            </thead>
                                        <?php
                                    } ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $fm->increment(); ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['days']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['class_grade'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['tname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['subjectname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['end_time']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['year_name']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                } ?>
                                        </table>
                                        <!-- end of schedule -->

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xxl-3 order-1 order-xxl-1">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="mb-0">Make new class</h5>
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
<?php
} ?>
<script></script>
<!--  -->
<script>
    $(function() {
        $("#insert_class_year_name")
            .datepicker({
                dateFormat: "yy-mm-dd",
                autoclose: true,
            })
            .val();
    });
    $(document).ready(function() {
        $("#insert_class_start_time").timepicker({
            autoclose: true,
        });
    });
    // this is for generating class code
    function RandomClassCode() {
        let random = "";
        for (let i = 0; i < 5; i++) {
            random += Math.floor(Math.random() * 5);
        }
        return random;
    }
    document.querySelector("#insert_class_code").value = RandomClassCode();
    // generate Class name
    function RandomClassName(length) {
        let result = "";
        let character = "ABCDEF223GHIJ721KLMNOPQRSTUVWXY012345JDHMELAO26789AIIFKLE2AFKJD";
        let characterlength = character.length;
        for (let i = 0; i < length; i++) {
            result += character.charAt(Math.floor(Math.random() * characterlength)).toUpperCase();
        }
        return result;
    }
    document.querySelector("#insert_class_name").value = RandomClassName(4);
</script>