<?php
$ports = [3306, 3307, 3308, 3309];
foreach ($ports as $port) {
    echo "Probing port $port... ";
    $con = @mysqli_connect("127.0.0.1", "root", "", "", $port);
    if ($con) {
        echo "CONNECTED! ";
        $res = mysqli_query($con, "SELECT @@port as port, @@hostname as hostname");
        $row = mysqli_fetch_assoc($res);
        echo "Reported Port: " . $row['port'] . " | Hostname: " . $row['hostname'] . "\n";

        $res2 = mysqli_query($con, "SHOW DATABASES LIKE 'onlinecourse'");
        if (mysqli_num_rows($res2) > 0) {
            echo "  Found 'onlinecourse' DB. ";
            mysqli_select_db($con, "onlinecourse");
            $res3 = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
            if ($res3) {
                $count = mysqli_fetch_array($res3)[0];
                echo "userlog rows: $count\n";
            }
            else {
                echo "userlog table not found.\n";
            }
        }
        else {
            echo "  'onlinecourse' DB NOT found.\n";
        }
        mysqli_close($con);
    }
    else {
        echo "Failed: " . mysqli_connect_error() . "\n";
    }
}
?>
