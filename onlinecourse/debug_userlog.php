<?php
include("includes/config.php");
$query = mysqli_query($con, "SELECT COUNT(*) as total FROM userlog");
$row = mysqli_fetch_array($query);
echo "Total logs: " . $row['total'] . "\n";

$query = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 5");
while($row = mysqli_fetch_array($query)) {
    echo "ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . " | Time: " . $row['loginTime'] . " | IP: " . $row['userip'] . "\n";
}
?>
