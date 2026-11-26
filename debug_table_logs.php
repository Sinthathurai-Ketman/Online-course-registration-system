<?php
include('onlinecourse/includes/config.php');
$res = mysqli_query($con, "SELECT id, studentRegno, userip, loginTime, status FROM userlog ORDER BY id DESC LIMIT 10");
echo str_pad("ID", 5) . " | " . str_pad("RegNo", 20) . " | " . str_pad("IP", 15) . " | " . str_pad("Time", 20) . " | Status\n";
echo str_repeat("-", 75) . "\n";
while ($row = mysqli_fetch_assoc($res)) {
    echo str_pad($row['id'], 5) . " | " . str_pad($row['studentRegno'], 20) . " | " . str_pad($row['userip'], 15) . " | " . str_pad($row['loginTime'], 20) . " | " . $row['status'] . "\n";
}
?>
