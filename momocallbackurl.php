<?php
header("Content-Type: application/json");

$momoCallbackResponse = file_get_contents('php://input');
$logFile = "momocollection.json";
$log = fopen($logFile, "a");
fwrite($log, $momoCallbackResponse);
fclose($log);
$content = json_decode($momoCallbackResponse);
