<?php
include('includes/config.php');
$out = "";
function dump($con, $table, &$out)
{
    $out .= "--- $table ---\n";
    $res = mysqli_query($con, "DESCRIBE $table");
    while ($row = mysqli_fetch_assoc($res))
        $out .= sprintf("%-15s %-15s %-5s\n", $row['Field'], $row['Type'], $row['Null']);
    $res = mysqli_query($con, "SELECT * FROM $table LIMIT 1");
    if ($row = mysqli_fetch_assoc($res))
        $out .= print_r($row, true);
    $out .= "\n";
}
dump($con, 'course_intake', $out);
dump($con, 'course_duration', $out);
dump($con, 'courseenrolls', $out);
dump($con, 'department', $out);
file_put_contents('diagnose_result.txt', $out);
?>
