    <?php include('../config/config.php'); ?>
    <?php include('../database/database.php') ?>


    <?php $db = new Database(); ?>
    <?php
    $student_profile_id = mysqli_real_escape_string($db->link, $_POST['student_profile_id']);
    $student_update_bio = mysqli_real_escape_string($db->link, $_POST['student_update_bio']);
    $student_facebook_update =mysqli_real_escape_string($db->link, $_POST['student_facebook_update']);
    $student_youtube_update =mysqli_real_escape_string($db->link, $_POST['student_youtube_update']);
    $student_instagram_update = mysqli_real_escape_string($db->link, $_POST['student_instagram_update']);
    $student_twitter_update = mysqli_real_escape_string($db->link, $_POST['student_twitter_update']);
    $student_location_update = mysqli_real_escape_string($db->link, $_POST['student_location_update']);
    $update = "UPDATE student_details SET id = '$student_profile_id'
                ,bio = '$student_update_bio'
                ,facebook = '$student_facebook_update'
                ,youtube = '$student_youtube_update'
                ,instagram = '$student_instagram_update'
                ,twitter = '$student_twitter_update'
                ,location = '$student_location_update'               
                WHERE id = '$student_profile_id'";
                $update_row = $db->update($update);
                if ($update_row) {
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
