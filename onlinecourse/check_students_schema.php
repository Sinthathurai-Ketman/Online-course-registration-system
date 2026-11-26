<?php
include('includes/config.php');
$res = mysqli_query($con, "DESCRIBE students");
$out = "Table: students\n";
while ($row = mysqli_fetch_assoc($res)) {
    $out .= sprintf("%-20s | %-20s\n", $row['Field'], $row['Type']);
}
file_put_contents('students_schema.txt', $out);
?>
