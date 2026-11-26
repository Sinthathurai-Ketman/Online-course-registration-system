<?php
include("includes/config.php");
$sql = "ALTER TABLE userlog MODIFY userip VARCHAR(255)";
if (mysqli_query($con, $sql)) {
    echo "Database schema updated successfully.\n";
} else {
    echo "Error updating database schema: " . mysqli_error($con) . "\n";
}
?>
