<!-- this is file is belongs to the teachers
    everything belongs to the teachers
-->
<?php session_start(); ?>
<?php
$id;
if ( $_SESSION['admin_nim'] === NULL) {
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

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="teachers.php"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Teachers</span> </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="students.php"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students</span> </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="classes.php"> <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Schedule</span> </a>
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
            <!-- this is the search input, where you search for a student on the table -->
            <div>
                <input type="text" id="teacher_search" name="teacher_search" class="form-control" placeholder="Quick find here..." />
            </div>
            <!-- end search  -->
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown"> <i class="align-middle" data-feather="settings"></i> </a>
                        <!-- fetch adming profile
                                this is in every file, because we wnated to display 
                                the admin name, and profile on the header

                            -->
                        <?php
                            $query_image = "SELECT * FROM login WHERE admin_nim = '$id' ";
                            $query_image_row = $db->select($query_image); if ($query_image_row) { while ($row_image = $query_image_row->fetch_assoc()) { ?>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="../images/<?php echo $row_image['admin_image']; ?>" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
                            <span class="text-dark"><?php echo $row_image['admin_name']; ?></span>
                        </a>
                        <?php   }
                            } ?>
                        <!-- end  -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="">
                                <i class="align-middle mr-1" data-feather="user"></i>
                                <?php
                                      echo $id = $_SESSION['admin_nim'];
                                    ?>
                                <!-- this is the id  -->
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
                    <!-- errror here -->
                    <div class="alert alert-primary" role="alert" id="insert_message_teacher"></div>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-sm ">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 >Teachers Data</h5>
                        </div>
                        <div class="export-buttons">
                            <button type="button" id="TeacherExport" class="btn btn-primary"><i class="fas fa-file-csv"> CSV</i></button>

                            <form action="../pdf/generate_pdf.php" method="POST" target="_blank">
                                <button type="submit" name="TeacherExportpdf" class="btn btn-primary">
                                    <i class="fas fa-file-pdf"> PDF</i>
                                </button>
                            </form>
                        </div>
                        <!-- here is the teachers table everything about teacher is here except password   -->
                        <div class="card-body" id="turn-on-scroll">
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Professions</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                            $query = "SELECT * FROM teacher GROUP BY teacherid ORDER BY tec_id";
                                            $query_rearch = $db->select($query); $count_row = mysqli_num_rows($query_rearch); if ($count_row <= 0) { echo '
                                <div class="alert alert-primary" role="alert">
                                    No data found
                                </div>
                                '; } else { if ($count_row > 0) { while ($row = $query_rearch->fetch_assoc()) { ?>
                                <tbody>
                                    <tr id="tr_<?php echo $row['tec_id']; ?>">
                                        <td><?php echo $fm->increment(); ?></td>
                                        <td>
                                            <?php echo $row['teacherid']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['tname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['lastname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['country']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['profession']; ?>
                                        </td>
                                        <td>
                                            <a id="<?php echo $row['tec_id']; ?>" class="teacher_view" data-toggle="modal" data-target="#teacher_update_modal"> <i class="far fa-edit"></i> </a>
                                        </td>
                                        <td><i class="fas fa-trash-alt" id="teacher_delete_btn" onclick="delete_teacher('<?php echo $row['tec_id'] ?>')"></i></td>
                                    </tr>
                                </tbody>
                                <?php }}} ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- this form is to add new teacher -->
                <div class="col-12 col-md-12 col-xxl-3 order-1 order-xxl-1">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add New Teacher</h5>
                        </div>
                        <form id="teacher_insert_form" method="POST">
                            <div class="form-box">
                                <input type="text" class="form-control" id="insert_teacher_id_input" name="insert_teacher_id_input" placeholder="Enter Teacher ID" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_teacher_name_input" name="insert_teacher_name_input" placeholder="Enter Teacher Name" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_teacher_lastname_input" name="insert_teacher_lastname_input" placeholder="Enter Teacher Last Name" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_teacher_address_input" name="insert_teacher_address_input" placeholder="Enter Teacher Adderss" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_teacher_country_input" name="insert_teacher_country_input" placeholder="Enter Teacher Country" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_teacher_professions_input" name="insert_teacher_professions_input" placeholder="Enter Teacher Profession" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_teacher_pass_input" name="insert_teacher_pass_input" placeholder="Enter Teacher Password" autocomplete="off" />
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="insert_teacher_btn" name="insert_teacher_btn">Submit</button>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    // generate random ID for teachers
    // it generates 14 length logn
    function RandomID() {
        let len = "";
        for (var i = 0; i < 14; i++) {
            len += Math.floor(Math.random() * 9);
        }
        return len;
    }
    document.getElementById("insert_teacher_id_input").value = RandomID();
</script>
<?php include('../inc/footer.php'); ?>
<?php } ?>
