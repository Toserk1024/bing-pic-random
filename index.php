<?php
$type = @$_REQUEST['type'];
$return = @$_REQUEST['return'];

$ids = explode("\n", file_get_contents('bing-ids.txt'));
$random_id = $ids[array_rand($ids, 1)];
$url = 'https://cn.bing.com/th?id=' . $random_id;

if ($type === 'auto') {
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($ua, 'Mobile') !== false) {
        $type = 'm';
    } else {
        $type = 'pc';
    }
}

if ($type == 'm' || $type == 'mobile') {
    $random = $url . '_1080x1920.jpg';
} elseif ($type == 'uhd'){
    $random = $url . '_UHD.jpg';
} else {
    $random = $url . '_1920x1080.jpg';
}

if ($return === 'server') {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: image/jpeg');
    $image = file_get_contents($random);
    echo $image;
} else {
    header("Location: {$random}", true, 302);
}