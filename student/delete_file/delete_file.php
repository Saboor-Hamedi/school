<?php include('../../config/config.php'); ?>
<?php include('../../database/database.php') ?>

<?php $db = new Database();?>

<?php
    $id = $_POST['id'];
    $sql = mysqli_query($db->link, 'SELECT * FROM files WHERE file_id = "'.$id.'"');
    $row = mysqli_fetch_array($sql);
    $dl = "DELETE FROM files WHERE file_id = '$id' ";
    $result  = $db->delete($dl);
    if($result === true){
    $path = "../../upload_files/".$row['file_attachment'];
    unlink($path);
    echo 'File is deleting';
    echo '
        <script>
         $.LoadingOverlay("show");
        setTimeout(function(){
        window.location.reload();
        $.LoadingOverlay("hide");

        },3000);
        </script>
    ';

    }else{
        echo 'Delete failed';
    }
   
    $db->closeConnection();