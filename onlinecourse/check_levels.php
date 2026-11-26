<?php
include('includes/config.php');

echo "--- Level Table ---\n";
$res = mysqli_query($con, "SELECT * FROM level");
while ($row = mysqli_fetch_assoc($res)) {
    print_r($row);
}
?>
