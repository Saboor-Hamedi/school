<!-- this is the student account -->
<?php session_start(); ?>
<?php $id = "";?>
<?php
if ($_SESSION['admin_nim'] == null) {
    header('Location: /index.php');
} else { ?>
<?php $id = $_SESSION['admin_nim']; ?>
<?php  $PageTitle = "Student Account";?>
<?php include('../inc/header.php'); ?>
<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="student_account.php"> <span class="align-middle"> A.S Private High
                    School</span> </a>
            <ul class="sidebar-nav">
                <i class="align-middle" data-feather="">
                    <hr />
                </i>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="student_account.php"> <i class="align-middle" data-feather="sliders">
                        </i> <span class="align-middle">Home</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="../posts/blog-post.php"> <i class="align-middle"
                            data-feather="sliders"> </i> <span class="align-middle">Post</span> </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="student_settings.php"> <i class="align-middle" data-feather="sliders">
                        </i> <span class="align-middle">Settings</span> </a>
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
                            $query_image = "SELECT * FROM student WHERE nim = '$id' ";
                            $query_image_row = $db->select($query_image); if ($query_image_row) {
                                while ($row_image = $query_image_row->fetch_assoc()) { ?>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <span class="text-dark"><?php echo $row_image['name']; ?></span>
                        </a>
                        <?php   }
                            } ?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="">
                                <i class="align-middle mr-1" data-feather="user"></i>
                                <?php echo $id = $_SESSION['admin_nim'];?>
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
            <!-- this is the background of student where displays the name and other details -->
            <sectoin class="student-bio-details card">
                <?php
                $query = "SELECT * FROM student INNER JOIN student_details ON student.nim = student_details.nim WHERE student.nim =  '$id'";
                $select_row = $db->select($query); if ($select_row) {
                    while ($row = $select_row->fetch_assoc()) { ?>
                <div class="student-details-body">
                    <div class="student-bio-profile-name">
                        <h1><?php echo $row['name']; ?>
                        </h1>
                        <p><?php $fm->BreakLine($row['bio'], 110, true); ?>
                        </p>
                    </div>
                    <div class="social-media-profiles">
                        <!-- locatoin -->
                        <?php if ($row['location'] == "") { ?>

                        <?php  } else { ?>
                        <span>
                            <i class="fas fa-map-marker-alt"> <?php echo $row['location']; ?>
                            </i>
                        </span>
                        <?php  } ?>

                        <!-- facebook -->
                        <?php
                            if ($row['facebook'] == "") { ?>

                        <?php } else { ?>

                        <span>
                            <a href="<?php echo $row['facebook']; ?>"
                                target="__blank"> <i class="fab fa-facebook"></i></a>
                        </span>
                        <?php } ?>

                        <!-- youtube -->
                        <?php
                    if ($row['youtube'] == "") { ?>
                        <?php } else { ?>
                        <span>
                            <a href="<?php echo $row['youtube']; ?>"
                                target="__blank"><i class="fab fa-youtube-square"></i></a>
                        </span>
                        <?php } ?>
                        <!-- instagram -->
                        <?php if ($row['instagram'] == "") { ?>

                        <?php } else { ?>
                        <span>
                            <a href="<?php echo $row['instagram']; ?>"
                                target="__blank"><i class="fab fa-instagram-square"></i></a>
                        </span>
                        <?php } ?>
                        <!-- twitter -->
                        <?php if ($row['twitter'] == "") { ?>
                        <?php } else { ?>
                        <span>
                            <a href="<?php echo $row['twitter']; ?>"
                                target="__blank"><i class="fab fa-twitter-square"></i></a>
                        </span>
                        <?php } ?>
                        <!-- location -->
                    </div>
                </div>
                <div class="student-footer-profile">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary student_view_profile_btn"
                        id="<?php echo $row['id']; ?> "
                        data-toggle="modal" data-target="#student_details_update_modal">
                        Edit profile
                    </button>
                </div>
                <?php }
                } ?>
            </sectoin>


            <section class="details">
                <div class="custom-bread">
                    <nav aria-label="breadcrumb">
                        <!-- error here -->
                        <!-- <div class="alert alert-primary  " role="alert" id="insert_message_classes"></div> -->
                    </nav>
                </div>
                <div class="col-12">
                    <div class=" ">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Your classes</h5>
                        </div>
                        <div class="card-body" id="turn-on-scroll">
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
                                <table class="table table-dark">
                                    <div class="grades">
                                        <h3><?php echo $result['class_grade']. 'th'. ' Grade'; ?>
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
                                            <td><?php echo $fm->increment(); ?>
                                            </td>
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
            </section>
            <!-- files -->
            <section class="file-box">
        <div class="alert alert-primary" id="delete_student_file_message" role="alert"></div>
                <div class="file-grid">
                <?php 
                    $query = "SELECT * FROM student INNER JOIN files ON student.nim = files.nim WHERE student.nim = '$id'  GROUP BY file_attachment";
                    $file_found =$db->select($query);
                    while($row = $file_found->fetch_assoc()){?>
                        <nav class="file-panel">
                            <div class="file_title">
                                <span><?php echo $row['file_title']; ?></span>
                                 <span>  <a onclick="delete_student_file('<?php echo $row['file_id'] ?>')"><i class="fas fa-trash"></i></a></span>
                            </div>

                        <div class="file-attachement">
                                <a href="../upload_files/<?php echo $row['file_attachment']; ?>"
                                         target="__blank"><?php echo $row['file_attachment']; ?>
                               </a>
                            </div>
                              <div class="file-description">
                              <p>
                                <?php echo $row['file_description']; ?>
                              </p>
                            </div>
                             <div class="file-date">
                               <span> <?php echo $row['send_date']; ?></span>
                            </div> 
                        </nav>
                        
                    <?php } ?>       
   
           </div>
       
            </section>

            <!-- notes -->

            <section class="notes">
                <!-- notes -->
                <header id="header">
                    <nav id="navbar">
                        <ul>
                            <li id="deleteAll">Delete all</li>
                        </ul>
                    </nav>
                </header>
                <div id="how-it-works"></div>
                <!-- this is the stickers -->
                <div id="main" class="stickers">
                    <div class="sticky">
                        <div class="sticky-header">
                            <span class="sticky-header-menu add-button fas fa-plus" title="new sticky"></span>
                            <span class="sticky-header-menu notSaved fas fa-check" title="not saved"></span>

                            <span class="sticky-header-menu remove-button fas fa-trash-alt"
                                title="delete sticky"></span>
                        </div>
                        <textarea class="sticky-content"> </textarea>
                    </div>
                    <div id="createStickyBtn">+</div>
                </div>
            </section>
        </main>



    </div>
</div>

<?php include('../inc/footer.php'); ?>
<?php }
