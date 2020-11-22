<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>
<?php session_start(); ?>
<?php
   $id = "";
   if ($_SESSION['admin_nim'] === NULL ) {
       header('Location: /index.php');
   } else { ?>
<?php $id = $_SESSION['admin_nim'];
   ?>
<?php include('header/header.php'); ?>
<header class="header text-center">
   <h1 class="blog-name pt-lg-4 mb-0"><a href="homepost.php">Anthony's Blog</a></h1>
   <nav class="navbar navbar-expand-lg navbar-dark" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navigation" class="collapse navbar-collapse flex-column" >
         <div class="profile-section pt-3 pt-lg-0">
            <img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile.png" alt="image" >			
            <div class="bio mb-3">Hi, my name is Anthony Doe. Briefly introduce yourself here. You can also provide a link to the about page.<br><a href="about.php">Find out more about me</a></div>
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
            <li class="nav-item active">
               <a class="nav-link" href="homepost.php"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="blog-post.html"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog Post</a>
            </li>
            <li class="nav-item">
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
<section class="blog-list px-3 py-5 p-md-5">
   <div class="container">
      <div class="item mb-5">
         <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-7.jpg" alt="image">
            <div class="media-body">
               <h3 class="title mb-1"><a href="blog-post.html">Heading Lorem Ipsum Dolor Sit Amet</a></h3>
               <div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">5 min read</span><span class="comment"><a href="#">4 comments</a></span></div>
               <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
               <a class="more-link" href="blog-post.html">Read more &rarr;</a>
            </div>
            <!--//media-body-->
         </div>
         <!--//media-->
      </div>
      <!--//item-->
      <div class="item mb-5">
         <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-8.jpg" alt="image">
            <div class="media-body">
               <h3 class="title mb-1"><a href="blog-post.html">Heading Lorem Ipsum Dolor Sit Amet</a></h3>
               <div class="meta mb-1"><span class="date">Published 4 months ago</span><span class="time">3 min read</span><span class="comment"><a href="#">2 comments</a></span></div>
               <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
               <a class="more-link" href="blog-post.html">Read more &rarr;</a>
            </div>
            <!--//media-body-->
         </div>
         <!--//media-->
      </div>
      <!--//item-->
      <div class="item mb-5">
         <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-9.jpg" alt="image">
            <div class="media-body">
               <h3 class="title mb-1"><a href="blog-post.html">Heading Nemo Enim Ipsam Voluptatem </a></h3>
               <div class="meta mb-1"><span class="date">Published 4 months ago</span><span class="time">8 min read</span><span class="comment"><a href="#">7 comments</a></span></div>
               <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
               <a class="more-link" href="blog-post.html">Read more &rarr;</a>
            </div>
            <!--//media-body-->
         </div>
         <!--//media-->
      </div>
      <!--//item-->
      <div class="item mb-5">
         <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-10.jpg" alt="image">
            <div class="media-body">
               <h3 class="title mb-1"><a href="blog-post.html">Heading Perspiciatis Unde Omnis </a></h3>
               <div class="meta mb-1"><span class="date">Published 5 months ago</span><span class="time">15 min read</span><span class="comment"><a href="#">3 comments</a></span></div>
               <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
               <a class="more-link" href="blog-post.html">Read more &rarr;</a>
            </div>
            <!--//media-body-->
         </div>
         <!--//media-->
      </div>
      <!--//item-->
      <div class="item mb-5">
         <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-11.jpg" alt="image">
            <div class="media-body">
               <h3 class="title mb-1"><a href="blog-post.html">Heading Duis Arcu Tortor</a></h3>
               <div class="meta mb-1"><span class="date">Published 5 months ago</span><span class="time">10 min read</span><span class="comment"><a href="#">0 comment</a></span></div>
               <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
               <a class="more-link" href="blog-post.html">Read more &rarr;</a>
            </div>
            <!--//media-body-->
         </div>
         <!--//media-->
      </div>
      <!--//item-->
      <div class="item">
         <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-12.jpg" alt="image">
            <div class="media-body">
               <h3 class="title mb-1"><a href="blog-post.html">Heading Vestibulum Ante Ipsum Primis</a></h3>
               <div class="meta mb-1"><span class="date">Published 6 months ago</span><span class="time">2 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
               <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
               <a class="more-link" href="blog-post.html">Read more &rarr;</a>
            </div>
            <!--//media-body-->
         </div>
         <!--//media-->
      </div>
      <!--//item-->
      <nav class="blog-nav nav nav-justified my-5">
         <a class="nav-link-prev nav-item nav-link rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
         <a class="nav-link-next nav-item nav-link rounded-right" href="#">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
      </nav>
   </div>
</section>
<?php include('footer/footer.php'); ?>
<?php } ?>