<?php
include('onlinecourse/includes/config.php');
if ($con) {
    echo "Connection Success\n";
    echo "Host Info: " . mysqli_get_host_info($con) . "\n";
    echo "Server Info: " . mysqli_get_server_info($con) . "\n";
    echo "Protocol Version: " . mysqli_get_proto_info($con) . "\n";

    $res = mysqli_query($con, "SELECT @@port as port, @@hostname as hostname, @@datadir as datadir");
    $row = mysqli_fetch_assoc($res);
    echo "Port: " . $row['port'] . "\n";
    echo "Hostname: " . $row['hostname'] . "\n";
    echo "Data Dir: " . $row['datadir'] . "\n";
}
else {
    echo "Connection Failed: " . mysqli_connect_error() . "\n";
}
?>
