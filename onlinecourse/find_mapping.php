<?php
include('includes/config.php');

echo "--- Course Department mapping ---\n";
$res = mysqli_query($con, "SELECT courseCode, departmentId FROM course");
while ($row = mysqli_fetch_assoc($res)) {
    echo "Course: " . $row['courseCode'] . " | New Dept ID: " . $row['departmentId'] . "\n";
}

echo "\n--- Enrollment details for mismatch ---\n";
$res = mysqli_query($con, "SELECT id, course, department FROM courseenrolls");
while ($row = mysqli_fetch_assoc($res)) {
    echo "Enroll ID: " . $row['id'] . " | Course: " . $row['course'] . " | Old Dept ID: " . $row['department'] . "\n";
}
?>
