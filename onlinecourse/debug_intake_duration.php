<?php
include('includes/config.php');
$tables = ['course_intake', 'course_duration'];
foreach ($tables as $table) {
    echo "Table: $table\n";
    $res = mysqli_query($con, "DESCRIBE $table");
    while ($row = mysqli_fetch_assoc($res)) {
        print_r($row);
    }
}
?>
