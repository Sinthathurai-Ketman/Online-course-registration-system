<?php
session_start();
include("includes/config.php");
date_default_timezone_set('Asia/Kolkata');
$uid = $_SESSION['login'];
mysqli_query($con, "UPDATE userlog SET logout = NOW() WHERE studentRegno = '$uid' ORDER BY id DESC LIMIT 1");
session_unset();
// session_destroy(); // Optional, but session_unset is usually enough if you want to keep the session id
$_SESSION['errmsg'] = "You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
