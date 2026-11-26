<?php
$con = mysqli_connect("localhost", "root", "");
if (!$con)
    die("Connection failed");

$dbs = mysqli_query($con, "SHOW DATABASES");
echo str_pad("Database", 30) . " | " . str_pad("userlog Rows", 15) . " | Max ID\n";
echo str_repeat("-", 60) . "\n";

while ($db_row = mysqli_fetch_array($dbs)) {
    $db = $db_row[0];
    if (in_array($db, ['information_schema', 'mysql', 'performance_schema', 'sys']))
        continue;

    mysqli_select_db($con, $db);
    $table_check = mysqli_query($con, "SHOW TABLES LIKE 'userlog'");
    if (mysqli_num_rows($table_check) > 0) {
        $count_res = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
        $count = mysqli_fetch_row($count_res)[0];
        $max_res = mysqli_query($con, "SELECT MAX(id) FROM userlog");
        $maxid = mysqli_fetch_row($max_res)[0];
        echo str_pad($db, 30) . " | " . str_pad($count, 15) . " | $maxid\n";
    }
}
?>
