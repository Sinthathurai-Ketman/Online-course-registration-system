<?php
include("includes/config.php");

echo "--- CONNECTION INFO ---\n";
echo "Host: " . DB_SERVER . "\n";
echo "DB Name: " . DB_NAME . "\n";
echo "Active DB: " . mysqli_fetch_row(mysqli_query($con, "SELECT DATABASE()"))[0] . "\n";

echo "\n--- TABLE STRUCTURE: userlog ---\n";
$res = mysqli_query($con, "DESCRIBE userlog");
while ($row = mysqli_fetch_assoc($res)) {
    printf("%-15s %-15s %-10s %-10s\n", $row['Field'], $row['Type'], $row['Null'], $row['Default']);
}

echo "\n--- ROW COUNTS ---\n";
$total = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as c FROM userlog"))['c'];
echo "Total Rows in userlog: $total\n";

echo "\n--- SAMPLE ROWS (NEWEST TOP) ---\n";
$res = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 5");
while ($row = mysqli_fetch_assoc($res)) {
    print_r($row);
}

echo "\n--- CHECKING FOR OTHER DATABASES ---\n";
$res = mysqli_query($con, "SHOW DATABASES");
while ($row = mysqli_fetch_row($res)) {
    echo "DB: " . $row[0] . "\n";
}
?>
