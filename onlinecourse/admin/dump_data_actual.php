<?php
include('includes/config.php');

$output = "";
function dumpTable($con, $tableName, &$output)
{
    $output .= "\nData for $tableName:\n";
    $res = mysqli_query($con, "SELECT * FROM $tableName");
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $output .= print_r($row, true);
        }
    }
    else {
        $output .= "Error: " . mysqli_error($con) . "\n";
    }
}

dumpTable($con, 'department', $output);
dumpTable($con, 'course', $output);
file_put_contents('data_dump_result.txt', $output);
?>
