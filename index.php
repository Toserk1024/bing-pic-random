<?php
$type = @$_REQUEST['type'];
$return = @$_REQUEST['return'];
$file_path = "bing-ids.txt";
$file = fopen($file_path, "r");
$file_content = fread($file, filesize($file_path));
fclose($file);
$links = explode("\n", $file_content);
$random_index = array_rand($links, 1);
$random_name = $links[$random_index];
$url = 'https://cn.bing.com/th?id=' . $random_name;

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
?>