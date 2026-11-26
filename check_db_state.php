<?php
include('onlinecourse/includes/config.php');
if (!$con)
    die("Connection failed: " . mysqli_connect_error());
$res = mysqli_query($con, "SELECT DATABASE()");
$dbname = mysqli_fetch_row($res)[0];
echo "Current Database: $dbname\n";

$res = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
$count = mysqli_fetch_row($res)[0];
echo "userlog Rows: $count\n";

$res = mysqli_query($con, "SELECT MAX(id) FROM userlog");
$maxid = mysqli_fetch_row($res)[0];
echo "userlog Max ID: $maxid\n";
?>
