
<script src="../jquery_insert/teacher_ajax.js"></script>
<script src="../jquery_insert/student_ajax.js"></script>
<script src="../jquery_insert/admin_ajax.js"></script>
<script src="../jquery_insert/class_ajax.js"></script>
<script src="../jquery_insert/sendfile_ajax.js"></script>
<script src="../jquery_insert/createSticker.js"></script>
<script src="../jquery_insert/jquerytimepicker.js"></script>
<script src="../jquery_insert/student_select_profile_ajax.js"></script>
<script src="../visit/student_change_password.js"></script>
<script src="../student/delete_file/delete_file.js"></script>

<?php include('../insert_student_data/modal/student_update_modal.php'); ?>
<?php include('../insert_teacher_data/modal/teacher_update_modal.php'); ?>
<?php include('../student/student_account_update_modal.php'); ?>

<script src="../js/app.js"></script>

   <script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function (event)
    {
    history.pushState(null, document.title, location.href);
    });
    
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
 
</body>
</html>