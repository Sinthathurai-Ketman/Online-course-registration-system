<?php
include("includes/config.php");
$unique_id = "SEARCH_ME_" . time();
echo "Inserting unique log: $unique_id into " . DB_NAME . "\n";
mysqli_query($con, "INSERT INTO userlog(studentRegno,userip,loginTime,status) VALUES('$unique_id','127.0.0.1',NOW(),'1')");

$con_root = mysqli_connect("localhost", "root", "");
$res = mysqli_query($con_root, "SHOW DATABASES");
while ($db = mysqli_fetch_array($res)) {
    $dbname = $db[0];
    mysqli_select_db($con_root, $dbname);
    $res2 = mysqli_query($con_root, "SHOW TABLES LIKE 'userlog'");
    if (mysqli_num_rows($res2) > 0) {
        $res3 = mysqli_query($con_root, "SELECT COUNT(*) as found FROM userlog WHERE studentRegno = '$unique_id'");
        $row3 = mysqli_fetch_assoc($res3);
        if ($row3['found'] > 0) {
            echo "MATCH FOUND in Database: $dbname\n";
        }
    }
}
?>
