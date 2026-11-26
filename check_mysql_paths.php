<?php
include('onlinecourse/includes/config.php');
$res = mysqli_query($con, "SELECT @@datadir as datadir, @@port as port, @@hostname as hostname");
$row = mysqli_fetch_assoc($res);
echo "Data Dir: " . $row['datadir'] . "\n";
echo "Port: " . $row['port'] . "\n";
echo "Hostname: " . $row['hostname'] . "\n";

$res = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
echo "Rows in userlog: " . mysqli_fetch_row($res)[0] . "\n";
?>
