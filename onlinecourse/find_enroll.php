<?php
include('includes/config.php');
$out = "Specific Enrollment Trace\n";
$res = mysqli_query($con, "SELECT * FROM courseenrolls WHERE course='CSE104' LIMIT 1");
if ($row = mysqli_fetch_assoc($res)) {
    $out .= print_r($row, true);
}
else {
    $out .= "CSE104 not found, showing last 3 enrollments:\n";
    $res = mysqli_query($con, "SELECT * FROM courseenrolls ORDER BY id DESC LIMIT 3");
    while ($r = mysqli_fetch_assoc($res))
        $out .= print_r($r, true);
}
file_put_contents('enroll_trace.txt', $out);
?>
