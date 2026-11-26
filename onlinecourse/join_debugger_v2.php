<?php
include('includes/config.php');

$res = mysqli_query($con, "SELECT * FROM courseenrolls");
echo "Total records: " . mysqli_num_rows($res) . "\n";

while ($row = mysqli_fetch_assoc($res)) {
    $id = $row['id'];
    $fail = false;
    $msg = "Profile ID $id: ";

    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM course WHERE courseCode='" . $row['course'] . "'")) == 0) {
        $fail = true;
        $msg .= "[Course FAIL: " . $row['course'] . "] ";
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM course_intake WHERE id='" . $row['session'] . "'")) == 0) {
        $fail = true;
        $msg .= "[Intake FAIL: " . $row['session'] . "] ";
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM department WHERE id='" . $row['department'] . "'")) == 0) {
        $fail = true;
        $msg .= "[Dept FAIL: " . $row['department'] . "] ";
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM level WHERE id='" . $row['level'] . "'")) == 0) {
        $fail = true;
        $msg .= "[Level FAIL: " . $row['level'] . "] ";
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM course_duration WHERE id='" . $row['semester'] . "'")) == 0) {
        $fail = true;
        $msg .= "[Duration FAIL: " . $row['semester'] . "] ";
    }

    if ($fail)
        echo $msg . "\n";
    else
        echo "Profile ID $id: ALL JOINS OK\n";
}
?>
