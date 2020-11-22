<?php include('../config/config.php'); ?>
<?php include('../database/database.php') ?>
<?php $db = new Database();?>

<?php
// search for student id

if (!empty($_POST["keyword"])) {
    $query ="SELECT * FROM student WHERE nim like '" . $_POST["keyword"] . "%' ORDER BY id LIMIT 15";
    $result = $db->link->query($query);
    if (!empty($result)) {
        ?>
    <ul id="country-list">
    <?php
    foreach ($result as $country) {
                ?>
    <li onClick="selectCountry('<?php echo $country["nim"];  ?>');"><?php echo $country["nim"]; ?></li>
    <?php } ?>
    </ul>
    <?php
    }
} ?>
 




        