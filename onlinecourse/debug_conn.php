<?php
include("includes/config.php");
$query = mysqli_query($con, "SELECT @@port as port");
$row = mysqli_fetch_assoc($query);
echo "Database Port: " . $row['port'] . "\n";

$query = mysqli_query($con, "SELECT DATABASE() as db");
$row = mysqli_fetch_assoc($query);
echo "Current Database: " . $row['db'] . "\n";

$query = mysqli_query($con, "SELECT COUNT(*) as total FROM userlog");
$row = mysqli_fetch_assoc($query);
echo "Total logs in userlog: " . $row['total'] . "\n";
?>
