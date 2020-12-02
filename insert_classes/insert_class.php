
<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../settings/formats.php') ?>
<?php $db = new Database();?>
<?php $fm = new format();?>

<?php 

$insert_grade_class = "";
$insert_class_code = "";
$insert_class_name = "";
$insert_days_of_weeks_class= "";
$insert_class_year_name ="";
$insert_class_start_time ="";
$insert_class_subject ="";
$insert_class_teacher ="";
$insert_studet_search_box =(int) "0";

if(!empty($_POST)){
    try{
     $insert_grade_class = mysqli_real_escape_string($db->link, $_POST['insert_grade_class']);
     $insert_class_code = mysqli_real_escape_string($db->link, $_POST['insert_class_code']);
     $insert_class_name = mysqli_real_escape_string($db->link, $_POST['insert_class_name']);
     $insert_days_of_weeks_class = mysqli_real_escape_string($db->link, $_POST['insert_days_of_weeks_class']);
     $insert_class_year_name = mysqli_real_escape_string($db->link, $_POST['insert_class_year_name']);
     $insert_class_start_time = mysqli_real_escape_string($db->link, $_POST['insert_class_start_time']);
     $insert_class_subject = mysqli_real_escape_string($db->link, $_POST['insert_class_subject']);
     $insert_class_teacher = mysqli_real_escape_string($db->link, $_POST['insert_class_teacher']);
     $insert_studet_search_box = mysqli_real_escape_string($db->link, $_POST['search_box']);
        $sql = "INSERT INTO classes (class_grade, class_code, class_name, days, year_name, end_time, subjectid, teacherid, nim) 
        VALUES('$insert_grade_class',
               '$insert_class_code',
                '$insert_class_name',
                '$insert_days_of_weeks_class',
                '$insert_class_year_name',
                '$insert_class_start_time',
                '$insert_class_subject',
                '$insert_class_teacher',
                '$insert_studet_search_box')";
        if($db->insert($sql) === TRUE){
            echo 'Making new class...';
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
        }else{
            echo 'No new class made';
        }
    }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";

    }
    $db->closeConnection();


}