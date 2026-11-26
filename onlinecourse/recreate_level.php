<?php
include('includes/config.php');

$queries = [
    "CREATE TABLE IF NOT EXISTS `level` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `level` varchar(255) DEFAULT NULL,
      `creationDate` timestamp NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci",
    "INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
    (1, '1', '2024-02-11 00:59:02'),
    (2, '2', '2024-02-11 00:59:02'),
    (3, '3', '2024-02-11 00:59:09')"
];

foreach ($queries as $q) {
    if (mysqli_query($con, $q)) {
        echo "Success: " . substr($q, 0, 50) . "...\n";
    }
    else {
        echo "Error: " . mysqli_error($con) . "\n";
    }
}

// Also update courseenrolls rows that have no level to a default level (1) 
// to ensure they show up in the history.
$update = mysqli_query($con, "UPDATE courseenrolls SET level='1' WHERE level IS NULL OR level='0' OR level=''");
echo "Updated " . mysqli_affected_rows($con) . " existing enrollment records to default level 1.\n";
?>
