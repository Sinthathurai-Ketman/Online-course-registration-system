<?php
include('includes/config.php');

echo "--- session table ---\n";
$res = mysqli_query($con, "SELECT * FROM session");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);

echo "\n--- course_intake table ---\n";
$res = mysqli_query($con, "SELECT * FROM course_intake");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);

echo "\n--- semester table ---\n";
$res = mysqli_query($con, "SELECT * FROM semester");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);

echo "\n--- course_duration table ---\n";
$res = mysqli_query($con, "SELECT * FROM course_duration");
while ($row = mysqli_fetch_assoc($res))
    print_r($row);
?>
