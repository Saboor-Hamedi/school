    <?php
    session_start();
    $id = "";
    if ($_SESSION['admin_nim'] === null) {
        header('Location: /index.php');
    } else { ?>
        <?php $id = $_SESSION['admin_nim']; ?>
        <?php include('header/header.php'); ?>
        <nav class="nav-header">
            <header class="header">
                <span class="close-icon">
                    <i class='bx bx-menu' id="btnMenu"></i>
                </span>
            </header>
        </nav>
        <div class="side-bar">
        </div>
        <main id="main">
            <section class="blog-section">
                <div class="innsert-section">
                    <div class="left">
                        <div id="insert_message" class="text-center"></div>
                        <div class="create-post">
                            <!-- form -->
                            <div class="title">
                                <h3>Create Post </h3>
                            </div>
                            <form method="POST" id="post-form">
                                <div class="form-group">
                                    <input type="text" name="post_title" onkeyup="saveValue(this);" id="post_title" class="form-control" placeholder="What is you title... ?" autocomplete="off" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea name="post_content" onkeyup="saveValue(this);" id="post_content" class="form-control" rows="5" placeholder="Your content...?" autocomplete="off"></textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('post_content', {
                                       

                                    });
                                </script>
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $id; ?>" name="post_author_id" id="post_author_id" class="form-control" placeholder="This is the author ID" autocomplete="off" />
                                </div>
                            </form>
                            <div class="footer-btn">
                                <button type="button" class="btn btn-primary" id="insert_post_btn" name="insert_post_btn">Insert</button>
                            </div>
                        </div>
                    </div>
                    <?php $sql = " SELECT * FROM student INNER JOIN post ON student.nim = post.author_id  ORDER BY post.content_time  DESC"; ?>
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
                                    <?php if ($row['nim'] === $id) { ?>
                                        <div class="drop-down">
                                            <a class="toggle-dropdown">
                                                <i class="bx bx-dots-horizontal-rounded"></i></a>
                                            <div class="menu">
                                                <ul>
                                                    <li><a onclick="delete_home_post_function('<?php echo $row['id']; ?>')"><i class='bx bxs-trash'></i> Delete</a></li>
                                                    <li><a id="<?php echo $row['id']; ?>" name="edit_post_btn" class="edit_post_btn" data-bs-toggle="modal" data-bs-target="#update_home_modal"><i class='bx bxs-edit'></i> Edit</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="post-body">
                                    <h3>
                                        <a href="posts.php?id=<?php echo base64_encode($row['id']); ?>"><?php echo $fm->ToUpperCase($fm->RemoveHTML($row['title'])); ?></a>
                                    </h3>
                                </div>
                                <div class="post-content">
                                    <?php echo $fm->RemoveHTML($row['content']); ?>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="right">
                    <div class="suggestion">
                        <div class="inner-suggestion">
                            <?php $sql = " SELECT * FROM student INNER JOIN post ON student.nim = post.author_id  ORDER BY post.content_time  DESC"; ?>
                            <?php $post = $db->select($sql); ?>
                            <?php if ($post) { ?>
                                <?php while ($row = $post->fetch_assoc()) { ?>
                                    <ul>
                                        <li>
                                            <a href="posts.php?id=<?php echo base64_encode($row['id']); ?>">
                                                <?php echo $row['title']; ?>
                                            </a>
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
    <?php } ?>