<?php
include('includes/config.php');
session_start();

$login = $_SESSION['login'];
echo "Current Session Login: " . ($login ? $login : "NONE") . "\n";

$res = mysqli_query($con, "SELECT * FROM courseenrolls WHERE studentRegno='$login'");
echo "Raw records for this student: " . mysqli_num_rows($res) . "\n";

while ($row = mysqli_fetch_assoc($res)) {
    echo "Processing Enrollment ID: " . $row['id'] . "\n";

    // Check Course
    $c = $row['course'];
    $jc = mysqli_query($con, "SELECT * FROM course WHERE courseCode='$c'");
    echo "  - Join 'course' ($c): " . (mysqli_num_rows($jc) > 0 ? "OK" : "FAIL") . "\n";

    // Check Intake
    $s = $row['session'];
    $js = mysqli_query($con, "SELECT * FROM course_intake WHERE id='$s'");
    echo "  - Join 'course_intake' ($s): " . (mysqli_num_rows($js) > 0 ? "OK" : "FAIL") . "\n";

    // Check Dept
    $d = $row['department'];
    $jd = mysqli_query($con, "SELECT * FROM department WHERE id='$d'");
    echo "  - Join 'department' ($d): " . (mysqli_num_rows($jd) > 0 ? "OK" : "FAIL") . "\n";

    // Check Duration
    $sem = $row['semester'];
    $jsem = mysqli_query($con, "SELECT * FROM course_duration WHERE id='$sem'");
    echo "  - Join 'course_duration' ($sem): " . (mysqli_num_rows($jsem) > 0 ? "OK" : "FAIL") . "\n";
}
?>
