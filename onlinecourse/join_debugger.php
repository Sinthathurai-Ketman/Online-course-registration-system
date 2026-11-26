<?php
include('includes/config.php');

$res = mysqli_query($con, "SELECT * FROM courseenrolls");
if (!$res)
    die("Error fetching courseenrolls: " . mysqli_error($con));

echo "Total enrollment records: " . mysqli_num_rows($res) . "\n\n";

while ($row = mysqli_fetch_assoc($res)) {
    echo "Checking Profile ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . "\n";

    // Join 1: Course
    $course = $row['course'];
    $j1 = mysqli_query($con, "SELECT * FROM course WHERE courseCode='$course'");
    echo "  - Course ($course): " . (mysqli_num_rows($j1) > 0 ? "OK" : "FAIL") . "\n";

    // Join 2: Intake
    $session = $row['session'];
    $j2 = mysqli_query($con, "SELECT * FROM course_intake WHERE id='$session'");
    if (mysqli_num_rows($j2) == 0) {
        $j2_alt = mysqli_query($con, "SELECT * FROM session WHERE id='$session'");
        echo "  - Intake ($session): FAIL (Found in 'session' table? " . (mysqli_num_rows($j2_alt) > 0 ? "YES" : "NO") . ")\n";
    }
    else {
        echo "  - Intake ($session): OK\n";
    }

    // Join 3: Department
    $dept = $row['department'];
    $j3 = mysqli_query($con, "SELECT * FROM department WHERE id='$dept'");
    echo "  - Dept ($dept): " . (mysqli_num_rows($j3) > 0 ? "OK" : "FAIL") . "\n";

    // Join 4: Level
    $level = $row['level'];
    $j4 = mysqli_query($con, "SELECT * FROM level WHERE id='$level'");
    echo "  - Level ($level): " . (mysqli_num_rows($j4) > 0 ? "OK" : "FAIL") . "\n";

    // Join 5: Duration
    $sem = $row['semester'];
    $j5 = mysqli_query($con, "SELECT * FROM course_duration WHERE id='$sem'");
    if (mysqli_num_rows($j5) == 0) {
        $j5_alt = mysqli_query($con, "SELECT * FROM semester WHERE id='$sem'");
        echo "  - Duration ($sem): FAIL (Found in 'semester' table? " . (mysqli_num_rows($j5_alt) > 0 ? "YES" : "NO") . ")\n";
    }
    else {
        echo "  - Duration ($sem): OK\n";
    }
    echo "------------------------------------------------\n";
}
?>
