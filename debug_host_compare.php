<?php
echo "Connecting to localhost...\n";
$con1 = @mysqli_connect("localhost", "root", "", "onlinecourse");
if ($con1) {
    $res = mysqli_query($con1, "SELECT COUNT(*) FROM userlog");
    echo "  localhost Rows: " . mysqli_fetch_row($res)[0] . "\n";
    mysqli_close($con1);
}
else {
    echo "  localhost Failed: " . mysqli_connect_error() . "\n";
}

echo "Connecting to 127.0.0.1...\n";
$con2 = @mysqli_connect("127.0.0.1", "root", "", "onlinecourse");
if ($con2) {
    $res = mysqli_query($con2, "SELECT COUNT(*) FROM userlog");
    echo "  127.0.0.1 Rows: " . mysqli_fetch_row($res)[0] . "\n";
    mysqli_close($con2);
}
else {
    echo "  127.0.0.1 Failed: " . mysqli_connect_error() . "\n";
}
?>
