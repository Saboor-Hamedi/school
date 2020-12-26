<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $db = new Database(); ?>
<?php $fm = new format(); ?>
<?php session_start(); ?>
<?php
$id = "";
if ($_SESSION['admin_nim'] === null) {
	header('Location: /index.php');
} else { ?>
	<?php $id = $_SESSION['admin_nim'];
	?>
	<?php include('header/header.php'); ?>
	<header class="header text-center">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div id="navigation" class="collapse navbar-collapse flex-column">
				<div class="profile-section pt-3 pt-lg-0">
					<img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile.png" alt="image" />
					<div class="bio mb-3">
						<?php
						$query = "SELECT * FROM student INNER JOIN student_details ON student.nim = student_details.nim WHERE student.nim =  '$id' LIMIT 1";
						$select_row = $db->select($query);
						if ($select_row) {
							while ($row = $select_row->fetch_assoc()) { ?>
								<?php $fm->BreakLine($row['bio'], 95, true); ?>
								<br />

						<?php }
						} ?>
					</div>

					<hr />
				</div>

				<ul class="navbar-nav flex-column text-left">
					<li class="nav-item ">
						<a class="nav-link" href="blog-post.php">
							<i class="fas fa-bookmark fa-fw mr-2"></i>Posts</a>
					</li>
					<li class="nav-item  active">
						<a class="nav-link" href="homepost.php">
							<i class="fas fa-home fa-fw mr-2"></i>Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../student/student_account.php"><i class="fas fa-long-arrow-alt-left mr-2"></i>Go Back</a>
					</li>
				</ul>
				<div class="my-2 my-md-3">
					<a class="btn btn-primary" href="#">Get in Touch</a>
				</div>
			</div>
		</nav>
	</header>
	<div class="main-wrapper">
		<section class="blog-list px-3 py-5 p-md-5">
			<div class="container">
				<!-- author -->
				<div class="mycontent">
					<!-- make new post -->
					<section id="post-card">
						<div class="post-insert">
							<div class="postitle">
								<h4 class="text-center">Create post</h4>
							</div>
							<div id="insert_message" class="text-center"></div>
							<form method="POST" id="post-form">
								<div class="form-group">
									<input type="text" name="post_title" onkeyup='saveValue(this);' id="post_title" class="form-control" placeholder="What is you title... ?" autocomplete="off" /></div>
								<div class="form-group">
									<textarea name="post_author_id" onkeyup='saveValue(this);' id="post_content" class="form-control" cols="30" rows="10" placeholder="Your content...?" autocomplete="off">
							</textarea>
								</div>
								<div class="form-group"><input type="hidden" value="<?php echo $id; ?>" name="post_author_id" id="post_author_id" class="form-control" placeholder="This is the author ID" autocomplete="off" /></div>
							</form>

							<button type="button" class="btn btn-primary" id="insert_post_btn" name="insert_post_btn">Insert</button>
						</div>
					</section>
					<!-- end make new post -->
				</div>
				<?php $sql = " SELECT * FROM student INNER JOIN post ON student.nim = post.author_id WHERE student.nim = '$id' ORDER BY post.content_time  DESC "; ?>
				<?php $post = $db->select($sql); ?>
				<?php if ($post) { ?>
					<?php while ($row = $post->fetch_assoc()) { ?>
						<div class="mycontent">
							<div class="item">
								<div class="post-title">
									<h3>
										<?php echo $fm->ToUpperCase($fm->RemoveHTML($row['title'])); ?>
									</h3>
									<div class="drop-box">
										<div class="submit-drop">
											<a class="toggle-dropdown"><i class="fas fa-ellipsis-h"></i></a>
											<ul class="dropdown">
												<li>
													<a onclick="delete_home_post_function('<?php echo $row['id']; ?>')">Delete</a>
												</li>
												<li>
													<a BreakLine>Edit</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post-body">
									<?php echo $row['name']; ?>
									<?php echo $fm->display_post_time($row['content_time']); ?>
								</div>
								<div class="post-content">
									<?php echo $fm->RemoveHTML($row['content']); ?>
								</div>
							</div>
						</div>
				<?php }
				} ?>
				<div>
					<h1>Hello</h1>
				</div>
			</div>
		</section>
		<?php include('footer/footer.php'); ?>
	<?php } ?>
	</div>