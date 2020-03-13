<?php
/*
 * WARNING: This part of the code is running for each incoming request. This
 * is a time-consuming task to work with IO and getting a list of files.
 */
$paths = array_filter(glob(__DIR__ . '/urls/*.php'), function ($file) {
    return is_file($file);
});

$tmsApi = array();

foreach ($paths as $path) {
    $myApi = include $path;
    $tmsApi = array_merge($tmsApi, $myApi);
}

return $tmsApi;
