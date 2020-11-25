<!-- this is the where student can change their passwords 
	 and other setting would be placed here
-->
<?php session_start(); ?>
<?php
$id;
if ($_SESSION['admin_nim'] == null) {
    header('Location: /index.php');
} else { ?>
<?php $id = $_SESSION['admin_nim']; ?>
<?php  $PageTitle = "Setings";?>
<?php include('../inc/header.php'); ?>
<div class="wrapper">
	<nav id="sidebar" class="sidebar">
		<div class="sidebar-content js-simplebar">
			<a class="sidebar-brand" href="index.php"> <span class="align-middle">A.S Private High School</span> </a>
			<ul class="sidebar-nav"> <i class="align-middle" data-feather="">
					<hr />
				</i>
				</i>
				<li class="sidebar-item">
					<a class="sidebar-link" href="../posts/homepost.php"> <i class="align-middle"
							data-feather="sliders">
						</i> <span class="align-middle">Post</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="student_account.php"> <i class="align-middle"
							data-feather="sliders"></i> <span class="align-middle">Home</span> </a>
				</li>
				<li class="sidebar-item active">
					<a class="sidebar-link" href="student_settings.php"> <i class="align-middle"
							data-feather="user"></i> <span class="align-middle">Settings</span> </a>
				</li>

			</ul>
		</div>
	</nav>
	<div class="main">
		<div class="navbar navbar-expand navbar-light navbar-bg">
			<a class="sidebar-toggle d-flex"> <i class="hamburger align-self-center"></i> </a>
			<div class="navbar-collapse collapse">
				<ul class="navbar-nav navbar-align">
					<li class="nav-item dropdown">
						<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown"> <i
								class="align-middle" data-feather="settings"></i> </a>
						<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
						</a>
						<!-- end -->
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href=""> <i class="align-middle mr-1" data-feather="user"></i>
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
							<div class="dropdown-divider"></div> <a class="dropdown-item"
								href="../logout/logout.php">Log out</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<main class="content">
			<div class="custom-bread ">
				<nav aria-label="breadcrumb">
					<!-- error here -->
				</nav>
			</div>
			<div class="col-12 col-md-12 col-xxl-12 d-flex order-3 order-xxl-2">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<h5 class="card-title mb-0">Admin Table</h5>
					</div>
					<div class="conten">
						<div class="col">
							<!-- column -->
						</div>
						<div class="col">
							<!-- column -->
						</div>
						<div class="col-lg">
							<div>
								<h3 class="text-center" style="margin-top: 10px;">Change Password</h3>
								<form id="admin_change_password_form" method="POST">
									<div class="alert alert-info" role="alert">
										<div id="message_change_student_password">

										</div>
									</div>
									<div class="form-box">
										<input type="password" name="old_student_password" class="form-control"
											id="old_student_password" placeholder="Enter your old password"
											autocomplete="off">
										<input type="password" name="new_student_password" class="form-control"
											id="new_student_password" placeholder="Enter your new password"
											autocapitalize="off">
										<input type="password" name="confirm_student_password" class="form-control"
											id="confirm_student_password" placeholder="Confirm your new password"
											autocomplete="off">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" id="change_astudent_password_btn"
											name="change_astudent_password_btn">Change</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<div class="col-lg">

					</div>


		</main>
	</div>
</div>
<?php include('../inc/footer.php'); ?>
<?php

}
