<?php
include("includes/config.php");
echo "--- Simulating user-log.php logic ---\n";
$sql = mysqli_query($con, "select * from userlog order by id desc LIMIT 10");
while ($row = mysqli_fetch_array($sql)) {
    echo "ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . " | Login: " . $row['loginTime'] . " | IP: " . $row['userip'] . "\n";
}
?>
