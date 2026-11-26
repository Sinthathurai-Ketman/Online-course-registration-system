<?php
include('includes/config.php');
$search = 'SEU/IS/21/BS/087';
$res = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='$search'");
if ($res && mysqli_num_rows($res) > 0) {
    echo "STUDENT FOUND:\n";
    print_r(mysqli_fetch_assoc($res));
}
else {
    echo "STUDENT NOT FOUND ($search)\n";
}

$res = mysqli_query($con, "SELECT COUNT(*) FROM students");
echo "Total students in table: " . mysqli_fetch_row($res)[0] . "\n";
?>
