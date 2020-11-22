<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>
<?php session_start(); ?>
<?php

$id = "";
if ($_SESSION['admin_nim'] == null || empty($_SESSION['admin_nim'])) {
    header('Location: /index.php');
} else { ?>
<?php $id = $_SESSION['admin_nim'];

?>
<?php include('header/header.php'); ?>

<header class="header text-center">
	<h1 class="blog-name pt-lg-4 mb-0"><a href="homepost.php">Anthony's Blog</a></h1>

	<nav class="navbar navbar-expand-lg navbar-dark">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
			aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="navigation" class="collapse navbar-collapse flex-column">
			<div class="profile-section pt-3 pt-lg-0">
				<img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile.png" alt="image">

				<div class="bio mb-3">Hi, my name is Anthony Doe. Briefly introduce yourself here. You can also provide
					a link to the about page.<br><a href="about.php">Find out more about me</a></div>
				<!--//bio-->
				<ul class="social-list list-inline py-3 mx-auto">
					<li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
				</ul>
				<!--//social-list-->
				<hr>
			</div>
			<!--//profile-section-->

			<ul class="navbar-nav flex-column text-left">
				<li class="nav-item">
					<a class="nav-link" href="homepost.php"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span
							class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="blog-post.php"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog Post</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="about.php"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
				</li>
			</ul>

			<div class="my-2 my-md-3">

				<a class="btn btn-primary" href="https://themes.3rdwavemedia.com/" target="_blank">Get in Touch</a>

			</div>
		</div>
	</nav>
</header>

<div class="main-wrapper">

	<article class="about-section py-5">
		<div class="container">
			<h2 class="title mb-3">About Me</h2>

			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
				Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
				ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
				fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis
				vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
				elementum semper nisi. Aenean vulputate eleifend tellus. </p>
			<figure><img class="img-fluid" src="assets/images/about-me.jpg" alt="image"></figure>
			<h5 class="mt-5">About The Blog</h5>
			<p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
				consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
				Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi
				vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus
				eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam
				nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
				Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros
				faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed
				consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce
				vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus.</p>
			<h5 class="mt-5">My Skills and Experiences</h5>
			<p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
				consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
				Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi
				vel augue. Curabitur ullamcorper ultricies nisi.</p>
			<h5 class="mt-5">Side Projects</h5>
			<p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
				consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
				Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi
				vel augue. Curabitur ullamcorper ultricies nisi.</p>

			<figure><a href="https://made4dev.com"><img class="img-fluid" src="assets/images/promo-banner.jpg"
						alt="image"></a></figure>
		</div>
	</article>
	<!--//about-section-->

	<section class="cta-section theme-bg-light py-5">
		<div class="container text-center">
			<h2 class="heading">Newsletter</h2>
			<div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
			<form class="signup-form form-inline justify-content-center pt-3">
				<div class="form-group">
					<label class="sr-only" for="semail">Your email</label>
					<input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail"
						placeholder="Enter email">
				</div>
				<button type="submit" class="btn btn-primary">Subscribe</button>
			</form>
		</div>
		<!--//container-->
	</section>
	<?php include('footer/footer.php'); ?>
	<?php }