<?php
include('includes/config.php');

$tables = ['course', 'course_duration', 'course_intake', 'courseenrolls', 'department', 'level', 'students'];

foreach ($tables as $table) {
    echo "--- Table: $table ---\n";
    $res = mysqli_query($con, "SELECT * FROM $table LIMIT 1");
    if ($res && mysqli_num_rows($res) > 0) {
        print_r(mysqli_fetch_assoc($res));
    }
    else {
        echo "  [EMPTY OR ERROR]\n";
    }
    echo "\n";
}
?>
