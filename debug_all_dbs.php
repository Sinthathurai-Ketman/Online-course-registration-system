<?php
$con = mysqli_connect("localhost", "root", "");
$res = mysqli_query($con, "SHOW DATABASES");
while ($db = mysqli_fetch_array($res)) {
    $dbname = $db[0];
    echo "Database: $dbname\n";
    $res2 = mysqli_query($con, "SHOW TABLES FROM `$dbname` ");
    if ($res2) {
        while ($table = mysqli_fetch_array($res2)) {
            echo "  - $table[0]\n";
        }
    }
}
?>
