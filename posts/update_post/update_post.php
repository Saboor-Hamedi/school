<?php include('../../config/config.php'); ?>
<?php include('../../database/database.php') ?>
<?php include('../../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>
<?php

    $edit_post_id = "";
    $edit_post_title = "";
    $edit_post_content = "";
    if (!empty($_POST)) {
        $edit_post_title = mysqli_real_escape_string($db->link, $_POST['edit_post_title']);
        $edit_post_content = mysqli_real_escape_string($db->link, $_POST['edit_post_content']);
        $edit_post_id = mysqli_real_escape_string($db->link, $_POST['edit_post_id']);
        $update = $db->link->prepare("UPDATE post SET title = ?, content = ? WHERE id = ? ");
        $update->bind_param('sss', $edit_post_title, $edit_post_content, $edit_post_id);
        if ($update->execute()) {
            echo 'Data is updating...';
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
            echo 'Data not updated';
        }
        $db->closeConnection();
    }
