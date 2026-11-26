<?php
include('onlinecourse/includes/config.php');
$res = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 10");
echo "--- LAST 10 USERLOG ENTRIES ---\n";
while ($row = mysqli_fetch_assoc($res)) {
    echo "ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . " | IP: " . $row['userip'] . " | Login: " . $row['loginTime'] . " | Logout: " . $row['logout'] . " | Status: " . $row['status'] . "\n";
}
?>
