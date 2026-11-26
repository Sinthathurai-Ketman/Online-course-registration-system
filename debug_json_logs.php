<?php
include('onlinecourse/includes/config.php');
$res = mysqli_query($con, "SELECT * FROM userlog ORDER BY id DESC LIMIT 10");
$data = [];
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
echo json_encode($data, JSON_PRETTY_PRINT);
?>
