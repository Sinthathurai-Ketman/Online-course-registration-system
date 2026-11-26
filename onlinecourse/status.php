<?php
include('includes/config.php');
echo "<h1>Database Diagnostic</h1>";
echo "<p><strong>Current File:</strong> " . __FILE__ . "</p>";
if (!$con) {
    echo "<p style='color:red;'><strong>Connection Failed:</strong> " . mysqli_connect_error() . "</p>";
}
else {
    $res = mysqli_query($con, "SELECT DATABASE()");
    $dbname = mysqli_fetch_row($res)[0];
    echo "<p><strong>Connected Database:</strong> $dbname</p>";

    $res = mysqli_query($con, "SELECT COUNT(*) FROM userlog");
    if ($res) {
        $count = mysqli_fetch_row($res)[0];
        echo "<p><strong>Rows in userlog:</strong> $count</p>";
    }
    else {
        echo "<p style='color:red;'><strong>Userlog Table Error:</strong> " . mysqli_error($con) . "</p>";
    }

    $res = mysqli_query($con, "SELECT MAX(id) FROM userlog");
    $maxid = mysqli_fetch_row($res)[0];
    echo "<p><strong>Latest Log ID:</strong> $maxid</p>";

    echo "<h3>Last 5 Logs</h3>";
    $res = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 5");
    echo "<table border='1'><tr><th>ID</th><th>RegNo</th><th>Time</th></tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['studentRegno']}</td><td>{$row['loginTime']}</td></tr>";
    }
    echo "</table>";
}
?>
