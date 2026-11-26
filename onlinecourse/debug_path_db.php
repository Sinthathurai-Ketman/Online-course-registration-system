<?php
echo "Current File Path: " . __FILE__ . "\n";
include('includes/config.php');
$res = mysqli_query($con, "SELECT DATABASE()");
echo "Database: " . mysqli_fetch_row($res)[0] . "\n";
$res = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
echo "Rows: " . mysqli_fetch_row($res)[0] . "\n";
?>
