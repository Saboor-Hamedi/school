<?php
session_start();
      $id = 0;
 if ($_SESSION['admin_nim'] === null) {
     header('Location: /index.php');
 } else {
     if (!isset($_GET['id'])|| empty($_GET['id']) && $_GET['id'] == null) {
         echo '<script>window.location.href="/error-404.html";</script>';
     } else {
         $id = $_GET['id'];
     }
 }
?>

<?php  $PageTitle = "Student";?>
<?php include('../inc/header.php'); ?>
 <?php
$sql = "SELECT * FROM student WHERE nim ='$id'";
$val = mysqli_query($db->link, $sql);
    while ($row = mysqli_fetch_array($val)) {?>
<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" > <span class="align-middle">A.S Private High School</span> </a>
            <ul class="sidebar-nav">
                <i class="align-middle" data-feather="">
                    <hr />
                </i>

                <li class="sidebar-item active">
                <a class="sidebar-link" href="visit-student-account.php?id=<?php echo $row['nim']; ?>">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Students</span>
                 </a>
                </li>
                   
                

                <li class="sidebar-item">
                    <a class="sidebar-link" href="visit-students-setting.php?id=<?php echo $row['nim']; ?>"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Settings</span> </a>
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
        </nav>
        <main class="content">
            <div class="custom-bread">
                <nav aria-label="breadcrumb">
                    <!-- errror here -->
                    <div class="alert alert-primary" role="alert" id="insert_message_student"></div>
                </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="mb-0">Students Data</h5>
                        </div>
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
                                        </tr>
                                    </thead>
                                    <?php
                                    $query = "SELECT * FROM student WHERE nim = '$id' GROUP BY nim ORDER BY nim";
                                      $query_rearch = mysqli_query($db->link, $query); while ($row = mysqli_fetch_array($query_rearch)) { ?>
                                    <tbody id="student_table_body">
                                        <tr>
                                            <td><?php echo $fm->increment(); ?></td>
                                            <td class="link">
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
                                        </tr>
                                    </tbody>
                                    <?php }  ?>
                                </table>
                                <!-- end table -->
                                <hr />
                                <div class="alert alert-primary" role="alert">
                                    <h2>Classes</h2>
                                </div>
                                <div class="table-cotent">
                                    <!-- display schedules based on the year  -->
                                    <?php
                                $year = null;
                                $sql = "SELECT * FROM student
                                INNER JOIN classes ON student.nim=classes.nim
                                INNER JOIN subjects ON classes.subjectid= subjects.subjectid
                                INNER JOIN teacher ON classes.teacherid=teacher.teacherid
                                INNER JOIN academic_year ON classes.year_name=academic_year.year_name
                                WHERE student.nim = '$id' ORDER BY classes.class_grade ";
                                    ?>
                                    <?php $query = mysqli_query($db->link, $sql); $num_rows = mysqli_num_rows($query); if ($num_rows <= 0) { ?>
                                    <div>
                                        <?php echo "No classes available"; ?>
                                    </div>
                                    <?php  } ?>
                                    <?php while ($result = mysqli_fetch_array($query)) { ?>
                                    <?php if ($year != ($result['class_grade'] . ' Grade ' . $result['class_grade'])) { ?>
                                    <table class="table table-bordered table-dark">
                                        <div class="alert alert-primary text-left" role="alert">
                                            <h3>
                                                <?php echo $result['class_grade']. "th  Grade"; ?>
                                            </h3>
                                        </div>
                                        <thead>
                                            <tr>
                                                <?php $year = $result['class_grade'] . ' Grade ' . $result['class_grade']; ?>
                                                <th>No</th>
                                                <th>Class</th>
                                                <th>Class Name</th>
                                                <th>Days</th>
                                                <th>Star Time</th>
                                                <th>Teacher Name</th>
                                                <th>Subject Name</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        } ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $fm->increment(); ?></td>
                                                <td>
                                                    <?php echo $result['class_grade'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['class_name']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $result['days']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['end_time']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['tname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['subjectname']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
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
<?php }?>

<?php include('../inc/footer.php'); ?>
 

 