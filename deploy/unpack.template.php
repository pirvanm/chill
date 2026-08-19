<?php
if (($_GET['token'] ?? '') !== '__TOKEN__') {
    http_response_code(404);
    exit;
}
$zip = new ZipArchive();
if ($zip->open(__DIR__ . '/../deploy.zip') === true) {
    $zip->extractTo(__DIR__ . '/..');
    $zip->close();
    unlink(__DIR__ . '/../deploy.zip');
    echo 'OK';
} else {
    http_response_code(500);
    echo 'ZIP_OPEN_FAILED';
}
unlink(__FILE__);
