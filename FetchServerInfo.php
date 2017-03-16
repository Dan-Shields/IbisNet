<?php
require 'php/ServerInfo.php';
$serverInfo = new ServerInfo;
$json = $serverInfo->getJSON();

echo $json;