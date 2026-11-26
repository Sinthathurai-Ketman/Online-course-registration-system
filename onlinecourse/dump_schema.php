<?php
include('includes/config.php');

$tables = ['course', 'session', 'department', 'level', 'course_duration', 'courseenrolls'];

foreach ($tables as $table) {
    echo "--- Table: $table ---\n";
    $res = mysqli_query($con, "SHOW COLUMNS FROM $table");
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "  " . $row['Field'] . " (" . $row['Type'] . ")\n";
        }
    }
    else {
        echo "  Table does not exist or error: " . mysqli_error($con) . "\n";
    }
    echo "\n";
}
?>
