<?php
include('includes/config.php');

// 1. Check current department IDs and names to build a map if needed
// Actually, let's just see what's in there.
$res = mysqli_query($con, "SELECT id, department FROM department");
while ($row = mysqli_fetch_assoc($res)) {
    echo "ID: " . $row['id'] . " | Name: " . $row['department'] . "\n";
}

// 2. See what numeric departments are in courseenrolls
$res = mysqli_query($con, "SELECT DISTINCT department FROM courseenrolls");
echo "\nDepartments found in courseenrolls:\n";
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['department'] . "\n";
}

// 3. Update logic:
// If the user manually changed department IDs from numeric to string, 
// we might need to know the mapping.
// However, if the user just wants it to work, we should probably 
// map numeric '1' to 'BSD' etc if that's what happened.

// Let's check the full output of debug_data.php again from my memory
// It said MISSING (1) and for departments it listed BSD and MTE.
?>
