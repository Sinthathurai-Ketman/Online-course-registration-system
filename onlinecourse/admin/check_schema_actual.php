<?php
include('includes/config.php');

$output = "";
function describeTable($con, $tableName, &$output)
{
    if (!$con) {
        $output .= "Connection error: " . mysqli_connect_error() . "\n";
        return;
    }
    $output .= "\nTable: $tableName\n";
    $res = mysqli_query($con, "DESCRIBE $tableName");
    if ($res) {
        $output .= sprintf("%-20s | %-20s | %-5s | %-5s | %-10s | %-20s\n", "Field", "Type", "Null", "Key", "Default", "Extra");
        $output .= str_repeat("-", 90) . "\n";
        while ($row = mysqli_fetch_assoc($res)) {
            $output .= sprintf("%-20s | %-20s | %-5s | %-5s | %-10s | %-20s\n",
                $row['Field'], $row['Type'], $row['Null'], $row['Key'], $row['Default'], $row['Extra']);
        }
    }
    else {
        $output .= "Error: " . mysqli_error($con) . "\n";
    }
}

describeTable($con, 'department', $output);
describeTable($con, 'course', $output);
file_put_contents('schema_result.txt', $output);
echo "Schema written to schema_result.txt\n";
?>
