<?php
include('includes/config.php');
$out = "Deep Print Debug\n" . str_repeat("-", 20) . "\n";

// Get any enrollment to test
$res = mysqli_query($con, "SELECT * FROM courseenrolls LIMIT 1");
$enroll = mysqli_fetch_assoc($res);

if (!$enroll) {
    $out .= "ERROR: No enrollments found in courseenrolls table.\n";
}
else {
    $out .= "Testing with Enrollment ID: {$enroll['id']}\n";
    $out .= "StudentRegno: {$enroll['studentRegno']}\n";
    $out .= "Course: {$enroll['course']}\n";
    $out .= "Session: {$enroll['session']}\n";
    $out .= "Department: {$enroll['department']}\n";
    $out .= "Semester: {$enroll['semester']}\n";
    $out .= "\n--- Step-by-Step Join Testing ---\n";

    // 1. Course Join
    $q1 = mysqli_query($con, "SELECT * FROM course WHERE courseCode='{$enroll['course']}'");
    $out .= "1. JOIN course: " . (mysqli_num_rows($q1) > 0 ? "SUCCESS" : "FAILED") . "\n";

    // 2. Intake Join (Try both columns)
    $q2a = mysqli_query($con, "SELECT * FROM course_intake WHERE id='{$enroll['session']}'");
    $q2b = mysqli_query($con, "SELECT * FROM course_intake WHERE intake_date='{$enroll['session']}'");
    $q2c = mysqli_query($con, "SELECT * FROM course_intake WHERE session='{$enroll['session']}'");
    $out .= "2a. JOIN course_intake (on id): " . (mysqli_num_rows($q2a) > 0 ? "SUCCESS" : "FAILED") . "\n";
    $out .= "2b. JOIN course_intake (on intake_date): " . (mysqli_num_rows($q2b) > 0 ? "SUCCESS" : "FAILED") . "\n";
    $out .= "2c. JOIN course_intake (on session): " . (mysqli_num_rows($q2c) > 0 ? "SUCCESS" : "FAILED") . "\n";

    // 3. Department Join
    $q3 = mysqli_query($con, "SELECT * FROM department WHERE id='{$enroll['department']}'");
    $out .= "3. JOIN department: " . (mysqli_num_rows($q3) > 0 ? "SUCCESS" : "FAILED") . "\n";

    // 4. Student Join
    $q4 = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='{$enroll['studentRegno']}'");
    $out .= "4. JOIN students: " . (mysqli_num_rows($q4) > 0 ? "SUCCESS" : "FAILED") . "\n";

    // 5. Duration Join
    $q5a = mysqli_query($con, "SELECT * FROM course_duration WHERE id='{$enroll['semester']}'");
    $q5b = mysqli_query($con, "SELECT * FROM course_duration WHERE semester='{$enroll['semester']}'");
    $out .= "5a. JOIN course_duration (on id): " . (mysqli_num_rows($q5a) > 0 ? "SUCCESS" : "FAILED") . "\n";
    $out .= "5b. JOIN course_duration (on semester): " . (mysqli_num_rows($q5b) > 0 ? "SUCCESS" : "FAILED") . "\n";
}

file_put_contents('print_debug_result.txt', $out);
?>
