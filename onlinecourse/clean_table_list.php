<?php
include('includes/config.php');
$res = mysqli_query($con, "SHOW TABLES");
while ($row = mysqli_fetch_row($res)) {
    $table = $row[0];
    $countRes = mysqli_query($con, "SELECT COUNT(*) FROM $table");
    $count = $countRes ? mysqli_fetch_row($countRes)[0] : "ERROR";
    echo "$table ($count rows)\n";
}
?>
