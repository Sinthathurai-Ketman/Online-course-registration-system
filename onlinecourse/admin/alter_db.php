<?php
include('includes/config.php');

$queries = [
    "ALTER TABLE department MODIFY id VARCHAR(255) NOT NULL",
    "ALTER TABLE department DROP PRIMARY KEY",
    "ALTER TABLE department ADD PRIMARY KEY (id)",

    "ALTER TABLE course MODIFY id VARCHAR(255) NOT NULL",
    "ALTER TABLE course DROP PRIMARY KEY",
    "ALTER TABLE course ADD PRIMARY KEY (id)",

    "ALTER TABLE courseenrolls MODIFY department VARCHAR(255)",
    "ALTER TABLE courseenrolls MODIFY course VARCHAR(255)"
];

foreach ($queries as $query) {
    if (mysqli_query($con, $query)) {
        echo "Successfully executed: $query <br>";
    }
    else {
        echo "Error executing: $query - " . mysqli_error($con) . "<br>";
    }
}
?>
