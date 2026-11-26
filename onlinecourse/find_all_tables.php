<?php
include('includes/config.php');

echo "--- ALL TABLES ---\n";
$res = mysqli_query($con, "SHOW TABLES");
while ($row = mysqli_fetch_row($res)) {
    echo $row[0] . "\n";
}

echo "\n--- COLUMNS IN courseenrolls ---\n";
$res = mysqli_query($con, "SHOW COLUMNS FROM courseenrolls");
while ($row = mysqli_fetch_assoc($res)) {
    echo "  " . $row['Field'] . "\n";
}
?>
