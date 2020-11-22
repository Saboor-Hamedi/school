<!-- this is the student page,
   this page belongs to the student
   where we fetch data about student -->
<?php session_start(); ?>
<?php
   $id;
   if ( $_SESSION['admin_nim'] === NULL) {
       header('Location: /index.php');
   } else { ?>
<?php $id = $_SESSION['admin_nim']; ?>
<!-- excel -->
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
                <li class="sidebar-item active">
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
    <!-- header -->
    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle d-flex"> <i class="hamburger align-self-center"></i> </a>
            <div>
                <!-- this is the search input, where you search for a student on the table -->
                <!-- search -->
                <input type="text" id="search_student" name="search_student" class="form-control" placeholder="Quick find here..." />
                <!-- end search  -->
            </div>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown"> <i class="align-middle" data-feather="settings"></i> </a>
                        <!-- select all students -->
                        <?php
                     $query_image = "SELECT * FROM login WHERE admin_nim = '$id' ";
                     $query_image_row = $db->select($query_image); if ($query_image_row) { while ($row_image = $query_image_row->fetch_assoc()) { ?>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="../images/<?php echo $row_image['admin_image']; ?>" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
                            <span class="text-dark"><?php echo $row_image['admin_name']; ?></span>
                        </a>
                        <?php   }
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
                    <!-- errror here -->
                    <div class="alert alert-primary" role="alert" id="insert_message_student"></div>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-9 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="mb-0">Students Data</h5>
                            <!-- this button is the export button
                        student table would be export to csv
                        with this button
                        --></div>
                        <div class="export-buttons">
                            <button type="button" id="btnExport" class="btn btn-primary"><i class="fas fa-file-csv"></i></button>
                        </div>
                        <!-- end export button -->

                        <div class="card-body" id="turn-on-scroll">
                            <div id="world_map" style="height: 350px;">
                                <!-- this is the student table  -->
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Country</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php
                              $query = "SELECT * FROM student GROUP BY id ORDER BY id ASC ";
                              $query_rearch = $db->select($query); $count_row = mysqli_num_rows($query_rearch); if ($count_row <= 0) { echo '
                                    <div class="alert alert-primary" role="alert">
                                        No data found
                                    </div>
                                    '; } else { if ($count_row > 0) { while ($row = $query_rearch->fetch_assoc()) { ?>
                                    <tbody id="student_table_body">
                                        <tr>
                                            <td><?php echo $fm->increment(); ?></td>
                                            <td>
                                                <?php echo $row['nim']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['lastname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['age']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['country']; ?>
                                            </td>
                                            <td>
                                                <a id="<?php echo $row['id']; ?>" class="student_view" data-toggle="modal" data-target="#student_update_modal"> <i class="far fa-edit"></i> </a>
                                            </td>
                                            <td><i class="fas fa-trash-alt" id="student_delete_btn" onclick="delete_student('<?php echo $row['id'] ?>')"></i></td>
                                        </tr>
                                    </tbody>
                                    <?php }
                              }
                              }?>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- here is the form, with this we add new student
               I'm using ajax and jquery, you can find it 
               in the folder of  <strong>insert_student_data</strong>
               everything there, and for ajax, its on the jquery_ajax, student_ajax.js
               -->
                <div class="col-12 col-md-12 col-xxl-3 order-1 order-xxl-1">
                   
                    <div class="card flex-fill ">
                        <div class="card-header">
                            <h5 class="mb-0">Add New Student</h5>
                        </div>
                        <form id="student_insert_form" method="POST">
                            <div class="form-box">
                                <input type="text" class="form-control" oninput="process(this)" id="insert_student_id_input" name="insert_student_id_input" placeholder="Enter Student ID" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_student_name_input" name="insert_student_name_input" placeholder="Enter Student Name" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_student_lastname_input" name="insert_student_lastname_input" placeholder="Enter Student Last Name" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_student_address_input" name="insert_student_address_input" placeholder="Enter Student Adderss" autocomplete="off" />
                                <input type="text" class="form-control" oninput="isEmail(this)" id="insert_student_email_input" name="insert_student_email_input" placeholder="Enter Student Email" autocomplete="off" />
                                <input type="text" class="form-control" oninput="process(this)" id="insert_student_age_input" name="insert_student_age_input" placeholder="Enter Student age" autocomplete="off" />
                                <input type="text" class="form-control" id="insert_student_country_input" name="insert_student_country_input" placeholder="Enter Student Country" autocomplete="off" />
                                <input type="password" class="form-control" id="insert_student_pass_input" name="insert_student_pass_input" placeholder="Enter Student Password" autocomplete="off" />
                                <input type="password" class="form-control" id="insert_student_conpass_input" name="insert_student_conpass_input" placeholder="Confirm Password" autocomplete="off" />
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="insert_sudent_btn" name="insert_sudent_btn">Submit</button>
                        </div>
                        <!-- end the form -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    // generate random ID for students
    // it generates 14 length logn
    function RandomID() {
        let len = "";
        for (var i = 0; i < 14; i++) {
            len += Math.floor(Math.random() * 9);
        }
        return len;
    }
    document.getElementById("insert_student_id_input").value = RandomID();
</script>
<?php include('../inc/footer.php'); ?>
<?php } ?>
