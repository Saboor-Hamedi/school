<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>

<?php $db = new Database(); ?>
<?php
 if (isset($_POST['limitstudent'])) {
     $limit = $_POST["limitstudent"];
     $query = mysqli_query($db->link, "SELECT * FROM student LIMIT $limit ");
     if (mysqli_num_rows($query)) {
         $no =1;
         while ($row = mysqli_fetch_array($query)) {
         } ?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['nim']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['country']; ?></td>
    <td>
        <a id="<?php echo $row['id']; ?>" class="student_view" data-toggle="modal" data-target="#student_update_modal">
            <i class="far fa-edit"></i>
        </a>
    </td>
    <td>
        <i class="fas fa-trash-alt" id="student_delete_btn" onclick="delete_student('<?php echo $row['id'] ?>')"></i>
    </td>
</tr>
<?php
    $no++;
     }
 }

?>