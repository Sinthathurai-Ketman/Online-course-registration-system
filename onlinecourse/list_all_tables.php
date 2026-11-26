<?php
include('includes/config.php');
$res = mysqli_query($con, "SHOW TABLES");
$tables = [];
while ($row = mysqli_fetch_row($res))
    $tables[] = $row[0];
echo implode(", ", $tables) . "\n";

foreach ($tables as $table) {
    if (strpos($table, 'level') !== false) {
        echo "MATCH FOUND: $table\n";
    }
}
?>
