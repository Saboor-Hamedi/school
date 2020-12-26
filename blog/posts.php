<?php
session_start();
$id = 0;
$admin_nim = 0;
if ($_SESSION['admin_nim'] === null) {
    header('Location: /index.php');
} else {
    if (!isset($_GET['id']) || empty($_GET['id']) && $_GET['id'] == null) {
        echo '<script>window.location.href="/error-404.html";</script>';
    } else {
        $id = base64_decode($_GET['id']);
    }
}
?>
<?php $admin_nim = $_SESSION['admin_nim']; ?>
<?php include('header/header.php'); ?>
<nav class="post-navbar">
    <header class="header">
        <!-- <div class="close-icon">
            <i class='bx bx-menu' id="postMenu" ></i>
        </div> -->
    </header>
</nav>

<section class="post-section">
    <div class="backTop">
        <a id="backTopbtn"><i class='bx bxs-chevron-up-circle'></i></a>
    </div>
    <div class="post-box"></div>
    <?php $sql = "SELECT * FROM student INNER JOIN post ON student.nim = post.author_id WHERE post.id = '$id'  ORDER BY post.content_time  DESC"; ?>
    <?php $post = $db->select($sql); ?>
    <?php if ($post) { ?>
        <?php while ($row = $post->fetch_assoc()) { ?>
            <div class="post-card">
                <div class="post-title">
                    <div class="back">
                        <a href="blog.php"><i class='bx bx-arrow-back'> </i></a>
                    </div>
                    <h1><?php echo $row['title']; ?></h1>
                </div>
                <?php echo $row['content']; ?>
            </div>
    <?php }
    } ?>
</section>
<section class="suggest-section">
    <?php $query = "SELECT * FROM post LIMIT 4 OFFSET 1";
    $post = $db->select($query);
    if ($post) {
        while ($result = $post->fetch_assoc()) { ?>
            <div class="post-card">
                <h4>
                    <a href="posts.php?id=<?php echo base64_encode($result['id']); ?>">
                        <?php echo $result['title']; ?>
                    </a>
                </h4>
                <p>
                    <?php echo $fm->ReadMore($result['content'], 150); ?>
                </p>
            </div>
    <?php }
    } ?>
</section>
<?php include('footer/footer.php'); ?>