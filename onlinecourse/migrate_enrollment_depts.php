<?php
include('includes/config.php');

// Get mapping from course table
$sql = "SELECT courseCode, departmentId FROM course";
$res = mysqli_query($con, $sql);
$mapping = [];
while ($row = mysqli_fetch_assoc($res)) {
    $mapping[$row['courseCode']] = $row['departmentId'];
}

echo "Starting migration...\n";
$updatedCount = 0;
foreach ($mapping as $courseCode => $deptId) {
    $updateSql = "UPDATE courseenrolls SET department='$deptId' WHERE course='$courseCode'";
    if (mysqli_query($con, $updateSql)) {
        $affected = mysqli_affected_rows($con);
        if ($affected > 0) {
            echo "Updated $affected rows for course $courseCode to dept $deptId\n";
            $updatedCount += $affected;
        }
    }
    else {
        echo "Error updating $courseCode: " . mysqli_error($con) . "\n";
    }
}

echo "Migration finished. Total rows updated: $updatedCount\n";
?>
