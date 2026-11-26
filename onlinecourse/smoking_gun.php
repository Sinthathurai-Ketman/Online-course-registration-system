<?php
include("includes/config.php");
$test_reg = "FIX_VERIFIED_999";
echo "Active Config - Database: " . DB_NAME . " on " . DB_SERVER . "\n";
echo "Inserting test log for: $test_reg\n";
$res = mysqli_query($con, "INSERT INTO userlog(studentRegno,userip,loginTime,status) VALUES('$test_reg','127.0.0.1',NOW(),'1')");
if ($res) {
    $inserted_id = mysqli_insert_id($con);
    echo "Successfully inserted! New ID: $inserted_id\n";
    
    echo "--- LATEST 5 LOGS IN DATABASE ---\n";
    $query = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 5");
    while ($row = mysqli_fetch_assoc($query)) {
        echo "ID: " . $row['id'] . " | Student: " . $row['studentRegno'] . " | Time: " . $row['loginTime'] . "\n";
    }
} else {
    echo "Insertion failed: " . mysqli_error($con) . "\n";
}
?>
