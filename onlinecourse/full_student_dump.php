<?php
include('includes/config.php');
$res = mysqli_query($con, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);
?>
