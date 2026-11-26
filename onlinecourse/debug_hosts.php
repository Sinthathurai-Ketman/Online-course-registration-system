<?php
echo "--- Checking localhost ---\n";
$con1 = mysqli_connect("localhost", "root", "", "onlinecourse");
if ($con1) {
    $res1 = mysqli_query($con1, "SELECT COUNT(*) as total FROM userlog");
    $row1 = mysqli_fetch_assoc($res1);
    echo "Localhost Count: " . $row1['total'] . "\n";
    $resID1 = mysqli_query($con1, "SELECT MAX(id) as max_id FROM userlog");
    $rowID1 = mysqli_fetch_assoc($resID1);
    echo "Localhost Max ID: " . $rowID1['max_id'] . "\n";
} else {
    echo "Failed to connect to localhost\n";
}

echo "\n--- Checking 127.0.0.1 ---\n";
$con2 = mysqli_connect("127.0.0.1", "root", "", "onlinecourse");
if ($con2) {
    $res2 = mysqli_query($con2, "SELECT COUNT(*) as total FROM userlog");
    $row2 = mysqli_fetch_assoc($res2);
    echo "127.0.0.1 Count: " . $row2['total'] . "\n";
    $resID2 = mysqli_query($con2, "SELECT MAX(id) as max_id FROM userlog");
    $rowID2 = mysqli_fetch_assoc($resID2);
    echo "127.0.0.1 Max ID: " . $rowID2['max_id'] . "\n";
} else {
    echo "Failed to connect to 127.0.0.1\n";
}
?>
