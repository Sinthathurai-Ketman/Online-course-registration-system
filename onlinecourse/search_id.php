<?php
include('includes/config.php');
$search = 'SEU/IS/21/BS/087';

$res = mysqli_query($con, "SHOW TABLES");
while ($row = mysqli_fetch_row($res)) {
    $table = $row[0];
    $colsRes = mysqli_query($con, "SHOW COLUMNS FROM $table");
    while ($col = mysqli_fetch_assoc($colsRes)) {
        $colName = $col['Field'];
        $q = "SELECT * FROM $table WHERE `$colName` LIKE '%$search%'";
        $findRes = mysqli_query($con, $q);
        if ($findRes && mysqli_num_rows($findRes) > 0) {
            echo "FOUND in table '$table', column '$colName':\n";
            while ($match = mysqli_fetch_assoc($findRes))
                print_r($match);
        }
    }
}
?>
