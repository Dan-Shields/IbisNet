<?php
require 'php/config.php';
require 'php/DBconnect.php';
require 'php/ServerInfoCache.php';
require 'php/ServerInfo.php';

$serverInfo = new ServerInfo;
$json = $serverInfo->getJSON();

echo $json;