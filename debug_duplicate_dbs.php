<?php
$con = mysqli_connect("localhost", "root", "");
if (!$con)
    die("Connection failed");

echo "Listing all databases with 'onlinecourse' in the name (case-insensitive):\n";
$res = mysqli_query($con, "SHOW DATABASES");
while ($row = mysqli_fetch_array($res)) {
    if (stripos($row[0], 'onlinecourse') !== false) {
        $db = $row[0];
        mysqli_select_db($con, $db);
        $res2 = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
        $count = $res2 ? mysqli_fetch_array($res2)[0] : "ERROR";
        echo "DB: $db | userlog rows: $count\n";
    }
}

echo "\nDetailed Userlog from current config.php:\n";
include('onlinecourse/includes/config.php');
$res = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
echo "Rows: " . mysqli_fetch_array($res)[0] . "\n";

$res = mysqli_query($con, "SELECT @@port as port, @@hostname as hostname");
$row = mysqli_fetch_assoc($res);
echo "Port: " . $row['port'] . " | Hostname: " . $row['hostname'] . "\n";
?>
