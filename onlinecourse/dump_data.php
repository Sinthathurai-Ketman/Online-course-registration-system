<?php
include('includes/config.php');

echo "--- STUDENTS ---\n";
$res = mysqli_query($con, "SELECT StudentRegno, studentName FROM students");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);

echo "\n--- ENROLLMENTS ---\n";
$res = mysqli_query($con, "SELECT id, studentRegno, course FROM courseenrolls");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);
?>
