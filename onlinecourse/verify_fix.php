<?php
include("includes/config.php");

// 1. Simulate Login
$regno = "TEST_USER";
$uip = "127.0.0.1";
$status = 1;

echo "Simulating login for $regno...\n";
$log = mysqli_query($con, "INSERT INTO userlog(studentRegno,userip,loginTime,status) VALUES('$regno','$uip',NOW(),'$status')");
$log_id = mysqli_insert_id($con);

if ($log_id) {
    echo "Login recorded successfully. Log ID: $log_id\n";
    
    // 2. Check Database Storage
    $query = mysqli_query($con, "SELECT * FROM userlog WHERE id = $log_id");
    $row = mysqli_fetch_assoc($query);
    echo "Stored IP: " . $row['userip'] . " (Expected: 127.0.0.1)\n";
    
    // 3. Simulate Logout
    echo "Simulating logout for $regno...\n";
    date_default_timezone_set('Asia/Kolkata');
    $ldate = date('d-m-Y h:i:s A', time());
    
    $update = mysqli_query($con, "UPDATE userlog SET logout = '$ldate' WHERE studentRegno = '$regno' ORDER BY id DESC LIMIT 1");
    
    if ($update) {
        $query = mysqli_query($con, "SELECT * FROM userlog WHERE id = $log_id");
        $row = mysqli_fetch_assoc($query);
        echo "Stored Logout Time: " . $row['logout'] . " (Expected something like " . $ldate . ")\n";
        
        if ($row['userip'] == $uip && $row['logout'] == $ldate) {
            echo "VERIFICATION SUCCESSFUL: Both Login and Logout recorded correctly.\n";
        } else {
            echo "VERIFICATION FAILED: Data mismatch.\n";
        }
    } else {
        echo "Logout update failed.\n";
    }
} else {
    echo "Login insertion failed: " . mysqli_error($con) . "\n";
}

// Cleanup
mysqli_query($con, "DELETE FROM userlog WHERE studentRegno = 'TEST_USER'");
?>
