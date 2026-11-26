<?php
session_start();
include('includes/config.php');

echo "--- courseenrolls latest row ---\n";
$res = mysqli_query($con, "SELECT * FROM courseenrolls ORDER BY enrollDate DESC LIMIT 1");
$row = mysqli_fetch_assoc($res);
print_r($row);

if ($row) {
    echo "\n--- Checking Joins for this row ---\n";

    $dept_id = $row['department'];
    $check_dept = mysqli_query($con, "SELECT * FROM department WHERE id='$dept_id'");
    echo "Department ($dept_id): " . (mysqli_num_rows($check_dept) > 0 ? "FOUND" : "NOT FOUND") . "\n";

    $course_code = $row['course'];
    $check_course = mysqli_query($con, "SELECT * FROM course WHERE courseCode='$course_code'");
    echo "Course ($course_code): " . (mysqli_num_rows($check_course) > 0 ? "FOUND" : "NOT FOUND") . "\n";

    $session_id = $row['session'];
    $check_session = mysqli_query($con, "SELECT * FROM course_intake WHERE id='$session_id'");
    echo "Intake/Session ($session_id): " . (mysqli_num_rows($check_session) > 0 ? "FOUND" : "NOT FOUND") . "\n";

    $sem_id = $row['semester'];
    $check_sem = mysqli_query($con, "SELECT * FROM course_duration WHERE id='$sem_id'");
    echo "Duration/Semester ($sem_id): " . (mysqli_num_rows($check_sem) > 0 ? "FOUND" : "NOT FOUND") . "\n";

    $level_id = $row['level'];
    $check_level = mysqli_query($con, "SELECT * FROM level WHERE id='$level_id'");
    echo "Level ($level_id): " . (mysqli_num_rows($check_level) > 0 ? "FOUND" : "NOT FOUND") . "\n";
}

echo "\n--- Session 'login' value ---\n";
echo "login: " . $_SESSION['login'] . "\n";
?>
