<?php
session_start();
include('includes/config.php');

echo "--- Students Table ---\n";
$res = mysqli_query($con, "SELECT StudentRegno, studentName FROM students");
while ($row = mysqli_fetch_assoc($res)) {
    print_r($row);
}

echo "\n--- courseenrolls rows ---\n";
$res = mysqli_query($con, "SELECT id, studentRegno, course, department FROM courseenrolls");
while ($row = mysqli_fetch_assoc($res)) {
    print_r($row);
}

echo "\n--- Session check ---\n";
echo "SESSION['login']: " . (isset($_SESSION['login']) ? $_SESSION['login'] : "NOT SET") . "\n";
?>
