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
<main id="main">
    <section class="blog-section">
        <div class="innsert-section">
            <?php $sql = "SELECT * FROM student INNER JOIN post 
                     ON student.nim = post.author_id WHERE post.id = '$id'  
                       ORDER BY post.content_time  DESC"; ?>
            <?php $post = $db->select($sql); ?>
            <?php if ($post) { ?>
                <?php while ($row = $post->fetch_assoc()) { ?>
                    <div class="contents">
                        <div class="content-title">
                            <div class="inner-title">
                                <strong><?php echo $row['name']; ?></strong>
                                <br>
                                <small>
                                    <?php echo $fm->display_post_time($row['content_time']); ?>
                                </small>
                            </div>
                            <!-- if the post does not belong to the user hide the edit and delete button -->
                        </div>
                        <div class="post-body">
                            <h3>
                                <?php echo $fm->ToUpperCase($fm->RemoveHTML($row['title'])); ?>
                            </h3>
                        </div>
                        <div class="post-content">
                            <?php echo $fm->RemoveHTML($row['content']); ?>
                        </div>
                    </div>
            <?php }} ?>
        </div>
        <div class="right">
            <div class="suggestion">
                <div class="inner-suggestion">
                    <?php
                    $sql = " SELECT * FROM student INNER JOIN post
                                ON student.nim = post.author_id 
                                ORDER BY post.content_time DESC";
                    ?>
                    <?php $post = $db->select($sql); ?>
                    <?php if ($post) { ?>
                        <?php while ($row = $post->fetch_assoc()) { ?>
                            <ul>
                                <li>
                                    <?php if($row['nim'] == '$admin_nim'){?>
                                        <a href="posts.php?id=<?php echo base64_encode($row['id']); ?>">
                                            <?php echo $row['title']; ?>
                                        </a>
                                        <?php }else{?>
                                            
                                        <?php } ?>
                                </li>
                            </ul>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer/footer.php'); ?>