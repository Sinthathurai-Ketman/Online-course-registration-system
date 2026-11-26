<?php
include('includes/config.php');

$res = mysqli_query($con, "SELECT DISTINCT studentRegno FROM courseenrolls");
echo "Reg Numbers in courseenrolls:\n";
while ($row = mysqli_fetch_row($res))
    echo "- " . $row[0] . "\n";

$res = mysqli_query($con, "SELECT StudentRegno, studentName FROM students");
echo "\nReg Numbers in students table:\n";
while ($row = mysqli_fetch_assoc($res))
    echo "- " . $row['StudentRegno'] . " (" . $row['studentName'] . ")\n";

?>
