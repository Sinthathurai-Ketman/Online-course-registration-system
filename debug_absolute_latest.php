<?php
include('onlinecourse/includes/config.php');
$res = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 1");
if ($res) {
    $row = mysqli_fetch_assoc($res);
    echo "LATEST USERLOG ENTRY:\n";
    print_r($row);
}
else {
    echo "Error: " . mysqli_error($con) . "\n";
}
echo "\nCURRENT SERVER TIME: " . date('Y-m-d H:i:s') . "\n";
?>
