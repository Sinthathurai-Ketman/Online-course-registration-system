<?php
include('includes/config.php');

$testId = 'TEST' . rand(100, 999);
$testName = 'Test Department';

echo "Testing string ID handling for departments...\n";

// 1. Insert
$ins = mysqli_query($con, "INSERT INTO department(id, department) VALUES('$testId', '$testName')");
if ($ins) {
    echo "SUCCESS: Inserted department with ID: $testId\n";
}
else {
    echo "FAILURE: Could not insert department: " . mysqli_error($con) . "\n";
    exit(1);
}

// 2. Verify
$res = mysqli_query($con, "SELECT * FROM department WHERE id='$testId'");
if ($row = mysqli_fetch_assoc($res)) {
    echo "SUCCESS: Verified department in DB: " . $row['department'] . "\n";
}
else {
    echo "FAILURE: Department not found in DB after insert.\n";
    exit(1);
}

// 3. Delete
$del = mysqli_query($con, "DELETE FROM department WHERE id='$testId'");
if ($del) {
    echo "SUCCESS: Deleted department with ID: $testId\n";
}
else {
    echo "FAILURE: Could not delete department: " . mysqli_error($con) . "\n";
    exit(1);
}

// 4. Final Verify
$res = mysqli_query($con, "SELECT * FROM department WHERE id='$testId'");
if (mysqli_num_rows($res) == 0) {
    echo "SUCCESS: Verified department is gone from DB.\n";
}
else {
    echo "FAILURE: Department still exists in DB after delete.\n";
    exit(1);
}

echo "\nAll DB-level tests passed!\n";
?>
