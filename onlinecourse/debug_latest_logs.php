<?php
include("includes/config.php");
echo "Current Time: " . date('Y-m-d H:i:s') . "\n";
echo "Database: " . DB_NAME . " on " . DB_SERVER . "\n";
$sql = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 5");
echo "--- LATEST 5 LOGS ---\n";
while ($row = mysqli_fetch_assoc($sql)) {
    echo "ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . " | Time: " . $row['loginTime'] . " | IP: " . $row['userip'] . " | Status: " . $row['status'] . "\n";
}
?>
