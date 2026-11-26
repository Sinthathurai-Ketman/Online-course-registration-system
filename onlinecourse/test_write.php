<?php
$file = 'test_write.txt';
$content = "Test at " . date('Y-m-d H:i:s') . "\n";
$res = file_put_contents($file, $content);
if ($res === false) {
    echo "FAILED to write to $file\n";
    $err = error_get_last();
    print_r($err);
}
else {
    echo "SUCCESS: Wrote $res bytes to $file\n";
}

// Also try to write to a parent dir file
$file2 = '../test_write_root.txt';
$res2 = file_put_contents($file2, $content);
if ($res2 === false) {
    echo "FAILED to write to $file2\n";
}
else {
    echo "SUCCESS: Wrote $res2 bytes to $file2\n";
}
?>
