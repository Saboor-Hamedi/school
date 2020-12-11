<?php include('../../config/config.php'); ?>
<?php include('../../database/database.php') ?>
<?php include('../../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>
<?php
    $post_title = "";
    $post_content = "";
    $post_author_id = "";
if (!empty($_POST)) {
    $post_title =     $_POST['post_title'];
    $post_content =   $_POST['post_content'];
    $post_author_id=  $_POST['post_author_id'];
    $sql = $db->link->prepare( "INSERT INTO post(title,content,author_id)
    VALUES(?,?,?)");
   $sql->bind_param('sss',$post_title,$post_content, $post_author_id);
    if ($sql->execute()) {
        echo 'Data is inserting...';
        echo '
                <script>
                    $.LoadingOverlay("show");
                    setTimeout(function(){
                    window.location.reload();
                    // Show full page LoadingOverlay
                    $.LoadingOverlay("hide");
                    },3000);
                </script>
               ';
    } else {
        echo 'Data not inserted';
    }
    $db->closeConnection();
}
