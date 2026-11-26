<?php
$con = mysqli_connect("localhost", "root", "");
$res = mysqli_query($con, "SHOW DATABASES");
echo str_pad("Database", 25) . " | " . str_pad("Table", 15) . " | " . str_pad("Rows", 10) . " | Max ID\n";
echo str_repeat("-", 65) . "\n";
while ($db = mysqli_fetch_array($res)) {
    $dbname = $db[0];
    mysqli_select_db($con, $dbname);
    $res2 = mysqli_query($con, "SHOW TABLES LIKE 'userlog'");
    if (mysqli_num_rows($res2) > 0) {
        $res3 = mysqli_query($con, "SELECT COUNT(*) as total FROM userlog");
        $row3 = mysqli_fetch_assoc($res3);
        $res4 = mysqli_query($con, "SELECT MAX(id) as max_id FROM userlog");
        $row4 = mysqli_fetch_assoc($res4);
        echo str_pad($dbname, 25) . " | " . str_pad("userlog", 15) . " | " . str_pad($row3['total'], 10) . " | " . $row4['max_id'] . "\n";
    }
}
?>
