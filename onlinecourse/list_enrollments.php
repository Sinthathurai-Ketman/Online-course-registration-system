<?php
include('includes/config.php');

echo "--- Students in DB ---\n";
$res1 = mysqli_query($con, "SELECT StudentRegno FROM students");
while ($r = mysqli_fetch_assoc($res1)) {
    echo "'" . $r['StudentRegno'] . "' (Length: " . strlen($r['StudentRegno']) . ")\n";
}

echo "\n--- Enrollments in DB ---\n";
$res2 = mysqli_query($con, "SELECT studentRegno FROM courseenrolls");
while ($r = mysqli_fetch_assoc($res2)) {
    echo "'" . $r['studentRegno'] . "' (Length: " . strlen($r['studentRegno']) . ")\n";
}
?>
