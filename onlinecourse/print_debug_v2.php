<?php
include('includes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cid = 'CSE104'; // Common ID from user screenshot
$regno = 'SEU/IS/21/BS/087'; // Known regno from previous dump

echo "Checking enrollment for $regno and course $cid\n\n";

$res = mysqli_query($con, "SELECT * FROM courseenrolls WHERE studentRegno='$regno' AND course='$cid'");
$enroll = mysqli_fetch_assoc($res);

if (!$enroll) {
    echo "NO ENROLLMENT FOUND for $regno and $cid\n";
    $res2 = mysqli_query($con, "SELECT * FROM courseenrolls WHERE studentRegno='$regno' LIMIT 1");
    if ($row = mysqli_fetch_assoc($res2)) {
        echo "Found different enrollment for this student:\n";
        print_r($row);
    }
}
else {
    echo "Enrollment record found:\n";
    print_r($enroll);

    // Test individual JOINS
    $session = $enroll['session'];
    $sem = $enroll['semester'];
    $course = $enroll['course'];

    $j1 = mysqli_query($con, "SELECT * FROM course WHERE courseCode='$course'");
    echo "Join Course: " . (mysqli_num_rows($j1) > 0 ? "OK" : "FAILED") . "\n";

    $j2 = mysqli_query($con, "SELECT * FROM course_intake WHERE session='$session' OR intake_date='$session'");
    echo "Join Intake: " . (mysqli_num_rows($j2) > 0 ? "OK" : "FAILED") . " (val: $session)\n";
    if (mysqli_num_rows($j2) > 0)
        print_r(mysqli_fetch_assoc($j2));

    $j3 = mysqli_query($con, "SELECT * FROM course_duration WHERE semester='$sem'");
    echo "Join Duration: " . (mysqli_num_rows($j3) > 0 ? "OK" : "FAILED") . " (val: $sem)\n";

    $j4 = mysqli_query($con, "SELECT * FROM department WHERE id='{$enroll['department']}'");
    echo "Join Dept: " . (mysqli_num_rows($j4) > 0 ? "OK" : "FAILED") . " (val: {$enroll['department']})\n";
}
?>
