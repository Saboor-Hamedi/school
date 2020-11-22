<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php include('../insert_student_data/export.php') ?>

<?php $db = new Database(); ?>
<?php $ex = new export($db); ?>
<?php
	 $ex->exportTables('teacher');
	