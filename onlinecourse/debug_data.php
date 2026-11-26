<?php
include('includes/config.php');

function check($con, $table, $col, $val)
{
    if (!$val)
        return "NULL/EMPTY";
    $res = mysqli_query($con, "SELECT * FROM $table WHERE $col='$val'");
    return (mysqli_num_rows($res) > 0) ? "OK ($val)" : "MISSING ($val)";
}

$res = mysqli_query($con, "SELECT * FROM courseenrolls ORDER BY enrollDate DESC LIMIT 3");
while ($row = mysqli_fetch_assoc($res)) {
    echo "Enrollment ID: " . $row['id'] . "\n";
    echo "Student: " . $row['studentRegno'] . "\n";
    echo " - Dept: " . check($con, "department", "id", $row['department']) . "\n";
    echo " - Course: " . check($con, "course", "courseCode", $row['course']) . "\n";
    echo " - Intake: " . check($con, "course_intake", "id", $row['session']) . "\n";
    echo " - Duration: " . check($con, "course_duration", "id", $row['semester']) . "\n";
    echo " - Level: " . check($con, "level", "id", $row['level']) . "\n";
    echo "--------------------------\n";
}

echo "\n--- Department Table Contents ---\n";
$res = mysqli_query($con, "SELECT id, department FROM department");
while ($row = mysqli_fetch_assoc($res))
    echo $row['id'] . " | " . $row['department'] . "\n";

?>
