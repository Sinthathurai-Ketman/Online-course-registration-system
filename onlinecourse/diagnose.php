<?php
include('includes/config.php');
function dump($con, $table)
{
    echo "--- $table ---\n";
    $res = mysqli_query($con, "DESCRIBE $table");
    while ($row = mysqli_fetch_assoc($res))
        printf("%-15s %-15s %-5s\n", $row['Field'], $row['Type'], $row['Null']);
    $res = mysqli_query($con, "SELECT * FROM $table LIMIT 1");
    if ($row = mysqli_fetch_assoc($res))
        print_r($row);
    echo "\n";
}
dump($con, 'course_intake');
dump($con, 'course_duration');
dump($con, 'courseenrolls');
dump($con, 'department');
?>
