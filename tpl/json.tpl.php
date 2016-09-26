<?php
use c3s\content\ContentObject;
$cms = ContentObject::getInstance();
$json = $cms->getData('json');
if (is_array($json)) {
    $json = json_encode($json);
}
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
echo $json;
