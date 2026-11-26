<?php
include('includes/config.php');
$tables = ['course', 'course_duration', 'course_intake', 'courseenrolls', 'department'];
foreach ($tables as $table) {
    echo "<h3>Table: $table</h3>";
    $res = mysqli_query($con, "SELECT * FROM $table LIMIT 5");
    echo "<table border='1'><tr>";
    while ($field = mysqli_fetch_field($res))
        echo "<th>{$field->name}</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        foreach ($row as $v)
            echo "<td>$v</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
