<?php
include('onlinecourse/includes/config.php');
echo "--- DB INFO ---\n";
echo "Host: " . DB_SERVER . "\n";
echo "User: " . DB_USER . "\n";
echo "DB: " . DB_NAME . "\n";

$res = mysqli_query($con, "SELECT COUNT(*) as total FROM userlog");
$row = mysqli_fetch_assoc($res);
echo "Total rows in userlog: " . $row['total'] . "\n";

$res = mysqli_query($con, "SELECT MAX(id) as max_id FROM userlog");
$row = mysqli_fetch_assoc($res);
echo "Max ID in userlog: " . $row['max_id'] . "\n";

echo "\n--- LAST 5 ROWS ---\n";
$res = mysqli_query($con, "SELECT id, studentRegno, loginTime FROM userlog ORDER BY id DESC LIMIT 5");
while ($row = mysqli_fetch_assoc($res)) {
    echo "ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . " | Time: " . $row['loginTime'] . "\n";
}
?>
