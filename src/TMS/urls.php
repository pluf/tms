<?php
$paths = array_filter(glob(__DIR__ . '/urls/*.php'), function ($file) {
    return is_file($file);
});

$tmsApi = array();

foreach ($paths as $path) {
    $myApi = include $path;
    $tmsApi = array_merge($tmsApi, $myApi);
}

return $tmsApi;
    